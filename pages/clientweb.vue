<template>
  <Layout :class="$style.root">
    <Card :class="$style.card">
      <div slot="title">
        <h1>{{ $t('Datahjelpen kundeweb') }}</h1>
      </div>
      <div slot="content">
        <p>Denne siden er midlertidig nede grunnet oppgradering av systemet.</p>
        <p>
          Trenger du hjelp med noe?
          <nuxt-link slot="links" :to="localePath('contact')"
            >Kontakt oss her
          </nuxt-link>
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
    title: 'Clientweb - Datahjelpen AS'
  },
  components: {
    Layout,
    Card
  },
  nuxtI18n: {
    paths: {
      en: '/clientweb',
      nb: '/clientweb'
    }
  }
}
</script>
<style lang="scss" module>
.root {
  margin: $space-xxlarge auto;
}

.card {
  margin: 0 auto;
  width: #{$size-base * 28}em;
}
</style>
