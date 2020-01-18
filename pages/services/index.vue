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
  width: (100%/2);

  @media ($media-min-medium) {
    width: (100%/3);
    padding: $space-base;
  }
}
</style>
<template>
  <Layout :class="$style.root">
    <h1 v-if="page.heading">{{ page.heading }}</h1>
    <p v-if="page.intro">{{ page.intro }}</p>
    <div :class="$style.cards">
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
  </Layout>
</template>
<script>
import Card from '../../components/Card'
import Layout from '../../components/Layout'

export default {
  head: {
    title: 'Tjenester - Datahjelpen AS'
  },
  components: {
    Card,
    Layout
  },
  async asyncData({ app: { $axios, i18n } }) {
    const url = '/i18n/' + i18n.locale + '/services.json'
    const data = await $axios
      .get(url)
      .then(res => {
        res.data.page = {
          heading: i18n.t('Tjenester')
        }
        return res.data
      })
      .catch(e => {
        return {
          page: {
            heading: i18n.t('Tjenester'),
            intro: i18n.t('Noe gikk feil. Vi klarte ikke hente data ...')
          }
        }
      })

    return data
  }
}
</script>
