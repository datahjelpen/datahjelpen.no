<template>
  <Layout :class="$style.root">
    <Card :class="$style.card">
      <div slot="title">
        <h1>{{ $t('Din melding ble sendt! ✉️') }}</h1>
      </div>
      <div slot="content">
        <p>
          {{ $t('Vi svarer deg så fort vi klarer. Det tar vanligvis mellom 1-2 dager.') }}
        </p>
        <br />
        <br />
        <p>
          {{ $t('Har du problemer med en av dine nettsider eller apper? Sjekk ') }}
          <a href="https://datahjelpen.statuspage.io/">datahjelpen.statuspage.io</a>
          {{ $t('for å se status på våre systemer.') }}
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
    title: 'Din melding ble sendt - Datahjelpen AS'
  },
  components: {
    Layout,
    Card
  },
  nuxtI18n: {
    paths: {
      en: '/takk-for-melding',
      nb: '/takk-for-melding'
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
