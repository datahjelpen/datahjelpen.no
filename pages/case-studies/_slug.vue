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

    <Layout v-if="item.textHeading">
      <h2>{{ item.textHeading }}</h2>
    </Layout>
    <Layout type="cols-2" v-if="item.text.length">
      <p v-for="(text, i) in item.text" :key="'case-study-text-' + i">
        {{ text }}
      </p>
    </Layout>
  </div>
</template>

<script>
import Layout from '../../components/Layout'

export default {
  components: {
    Layout
  },
  async asyncData({ app: { $axios, i18n }, params, error }) {
    const url = '/i18n/' + i18n.locale + '/case-studies.json'
    const data = await $axios.get(url).then(res => {
      return res.data
    })

    data.item = data.items[params.slug]

    if (data.item) {
      data.item.slug = params.slug

      return { ...data }
    }

    return error({ statusCode: 404, message: 'Case study was not found' })
  }
}
</script>
