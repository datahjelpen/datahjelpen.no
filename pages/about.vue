<template>
  <Layout :class="$style.root">
    <Card :class="$style.card">
      <div slot="title">
        <h1>{{ $t('Datahjelpen AS') }}</h1>
      </div>
      <div slot="content">
        <p>
          Firmaet Datahjelpen AS ble stiftet januar 2016 og ligger i Sandefjord.
        </p>
        <p>
          Datahjelpen leverer tjenester til bedriftsmarkedet. Vi tilbyr blant
          annet oppsett av nettsider, generell datahjelp og en-til-en opplæring.
          <nuxt-link slot="links" :to="localePath('services')"
            >Les mer om våre tjenester</nuxt-link
          >
        </p>
        <p>
          Vårt mål er å gi våre kunder en enklere IT-hverdag på en effektiv
          måte, til en fornuftig pris.
        </p>
      </div>
    </Card>
  </Layout>
</template>
<script>
import Layout from '../components/Layout'
import Card from '../components/Card'

export default {
  head: {
    title: 'Om oss - Datahjelpen AS'
  },
  components: {
    Layout,
    Card
  },
  nuxtI18n: {
    paths: {
      en: '/about',
      nb: '/om-oss'
    }
  }
}
</script>
<style lang="scss" module>
.root {
  margin: $space-large auto;
}

.card {
  margin: 0 auto;
  width: #{$size-base * 28}em;
}
</style>
