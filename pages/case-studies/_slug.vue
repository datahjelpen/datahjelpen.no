<style lang="scss" module>
@import 'single';
</style>
<template>
  <div :class="$style.root">
    <Layout type="full">
      <header :class="$style.header">
        <Layout :class="$style.headerTop">
          <div :class="$style.headerTitleWrapper">
            <span>{{ $t('Kundecase') }}</span>
            <h1>{{ item.title }}</h1>
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
        <img :src="item.imageHeader" :alt="item.title" />
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
        <MasonryGrid slot="items">
          <ProjectCard
            v-for="(customerCase, slug, i) in otherCases"
            :slot="'item-' + (i + 1)"
            :key="'customerCase-card-' + i"
            :title="customerCase.title"
            :link="customerCase.link"
            :image="customerCase.poster"
            :overlay="customerCase.overlay"
            :overlayHover="customerCase.overlayHover"
          >
          </ProjectCard>
        </MasonryGrid>
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

export default {
  head() {
    return {
      title: this.item.title + ' - Kundecaser - Datahjelpen AS'
    }
  },
  components: {
    Layout,
    InfoSection2,
    ProjectCard,
    MasonryGrid,
    Markdown
  },
  async asyncData({ app: { $axios, i18n }, params, error }) {
    const url = '/i18n/' + i18n.locale + '/case-studies.json'
    const data = await $axios
      .get(url)
      .then(res => {
        return res.data
      })
      .catch(e => {
        return null
      })

    if (data && typeof data === 'object') {
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
    }

    return error({ statusCode: 404, message: 'Case study was not found' })
  },
  computed: {
    // All services except the current one
    otherCases() {
      let otherCases = this.items
      for (const slug in this.items) {
        if (slug == this.item.slug) {
          delete otherCases[slug]
        }
      }

      return otherCases
    }
  }
}
</script>
