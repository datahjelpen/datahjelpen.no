<style lang="scss" module>
@import '../case-studies/single';

.header h1 {
  > span {
    color: $color-fg-headings;
    vertical-align: middle;
  }

  > img {
    display: inline-block;
    width: #{$size-base}em;
    height: #{$size-base}em;
    margin-right: #{$size-base}rem;
  }
}

.cards {
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
  margin-left: -$space-small;
  margin-right: -$space-small;

  @media ($media-min-medium) {
    margin-left: -$space-base;
    margin-right: -$space-base;
  }
}

.cardWrapper {
  width: (100%/2);
  padding: $space-small;

  @media ($media-min-medium) {
    width: (100%/3);
    padding: $space-base;
  }
}
</style>
<template>
  <div :class="$style.root">
    <Layout type="full">
      <header :class="$style.header">
        <Layout :class="$style.headerTop">
          <div :class="$style.headerTitleWrapper">
            <span>{{ $t('Tjeneste') }}</span>
            <h1>
              <img :src="item.icon" :alt="item.title" />
              <span>{{ item.title }}</span>
            </h1>
          </div>
          <div :class="$style.headerInfo">
            <p>{{ item.summary }}</p>
            <dl v-if="item.date || item.client">
              <dt v-if="item.date">{{ $t('Dato') }}</dt>
              <dd v-if="item.date">{{ item.date }}</dd>

              <dt v-if="item.client">{{ $t('Kunde') }}</dt>
              <dd v-if="item.client">{{ item.client }}</dd>
            </dl>
          </div>
        </Layout>
      </header>
    </Layout>

    <Layout
      v-for="(section, i) in item.content"
      :key="'content-section-' + i"
      type="full"
      :margin="section.margin"
      :bg="section.bg"
    >
      <Layout
        :type="section.layout"
        :padded="section.padded"
        :sticky="section.attributes && section.attributes.sticky"
        :borders="section.attributes && section.attributes.borders"
        :widths="section.attributes && section.attributes.widths"
        :hAlign="section.attributes && section.attributes['h-align']"
        :vAlign="section.attributes && section.attributes['v-align']"
      >
        <div
          v-for="(text, j) in section.text"
          :key="'content-section-' + i + '-' + j"
        >
          <Markdown>{{ text }}</Markdown>
        </div>
      </Layout>
    </Layout>

    <Layout>
      <InfoSection2>
        <div slot="header">
          <h2>
            {{ sectionName }}
          </h2>
          <h3>
            {{ sectionTitle }}
          </h3>
        </div>
        <div slot="content">
          <p>
            {{ sectionSummary }}
          </p>
        </div>
        <div slot="footer">
          <a class="button button-primary" :href="sectionButton.link">{{
            sectionButton.text
          }}</a>
        </div>

        <div :class="$style.cards" slot="items">
          <div
            :class="$style.cardWrapper"
            v-for="(service, i) in items"
            :key="'service-card-' + i"
          >
            <Card :link="service.link">
              <img slot="icon" :src="service.icon" />
              <h4 slot="title">{{ service.title }}</h4>
              <p slot="content">
                {{ service.summary }}
              </p>
              <a class="link link-styled" :href="service.link" slot="link">{{
                service.linkText
              }}</a>
            </Card>
          </div>
        </div>
      </InfoSection2>
    </Layout>
  </div>
</template>

<script>
import Layout from '../../components/Layout'
import InfoSection2 from '../../components/InfoSection2'
import ProjectCard from '../../components/ProjectCard'
import MasonryGrid from '../../components/MasonryGrid'
import Markdown from '../../components/Markdown'
import Card from '../../components/Card'

export default {
  components: {
    Layout,
    InfoSection2,
    ProjectCard,
    MasonryGrid,
    Markdown,
    Card
  },
  async asyncData({ app: { $axios, i18n }, params, error }) {
    const url = '/i18n/' + i18n.locale + '/services.json'
    const data = await $axios.get(url).then(res => {
      return res.data
    })

    data.item = data.items[params.slug]

    if (data.item) {
      data.item.slug = params.slug

      if (data.item.sectionName) {
        data.sectionName = data.item.sectionName
      }
      if (data.item.sectionTitle) {
        data.sectionTitle = data.item.sectionTitle
      }
      if (data.item.sectionSummary) {
        data.sectionSummary = data.item.sectionSummary
      }

      return { ...data }
    }

    return error({ statusCode: 404, message: 'Service was not found' })
  }
}
</script>
