<style lang="scss" module>
@import '../case-studies/single';
</style>
<template>
  <div :class="$style.root" v-if="item">
    <Layout type="full">
      <header :class="$style.header">
        <Layout :class="$style.headerTop">
          <div :class="$style.headerTitleWrapper">
            <span>{{ $t('Blogginnlegg') }}</span>
            <h1>{{ item.title }}</h1>
          </div>
          <div :class="$style.headerInfo">
            <p>{{ item.summary }}</p>
            <dl v-if="item.date || item.author">
              <dt v-if="item.date">{{ $t('Dato') }}</dt>
              <dd v-if="item.date">{{ item.date }}</dd>

              <dt v-if="item.author">{{ $t('Forfatter') }}</dt>
              <dd v-if="item.author">{{ item.author }}</dd>
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
  </div>
</template>
<script>
import Layout from '../../components/Layout'
import Card from '../../components/Card'
import Markdown from '../../components/Markdown'

export default {
  head() {
    return {
      title: this.item.title + ' - Databloggen - Datahjelpen AS'
    }
  },
  nuxtI18n: {
    paths: {
      en: '/blog/:slug',
      nb: '/blogg/:slug'
    }
  },
  components: {
    Layout,
    Card,
    Markdown
  },
  async asyncData({ app: { $axios, i18n }, params, error }) {
    const url = '/i18n/' + i18n.locale + '/blog.json'
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

        return { ...data }
      }
    }

    return error({ statusCode: 404, message: 'Blog post was not found' })
  }
}
</script>
