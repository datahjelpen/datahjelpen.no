<style lang="scss" module>
.root {
  margin: $space-large auto;
}

.root > h1 {
  text-align: center;
  margin-bottom: $space-medium;
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
  width: 50%;
  padding: $space-small;

  @media ($media-min-medium) {
    padding: $space-base;
  }
}
</style>
<template>
  <Layout :class="$style.root">
    <h1>{{ $t('Tjenester') }}</h1>
    <div :class="$style.cards">
      <div
        :class="$style.cardWrapper"
        v-for="(service, i) in services.items"
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
  </Layout>
</template>
<script>
import Card from '../../components/Card'
import Layout from '../../components/Layout'

export default {
  components: {
    Card,
    Layout
  },
  async asyncData({ app: { $axios, i18n } }) {
    // Get index page data
    const url = '/i18n/' + i18n.locale + '/index.json'
    const data = await $axios.get(url).then(res => {
      return res.data
    })

    // Get case studies data
    const casesUrl = '/i18n/' + i18n.locale + '/case-studies.json'
    const casesData = await $axios.get(casesUrl).then(res => {
      return res.data
    })

    data.cases.items = casesData.items

    return { ...data }
  }
}
</script>
