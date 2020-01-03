<style lang="scss" module>
.root {
  margin: $space-large auto;
}

.card {
  margin: 0 auto;
  width: #{$size-base * 28}em;
}
</style>
<template>
  <Layout :class="$style.root">
    <Card :class="$style.card">
      <div slot="title">
        <h1>{{ $t('Kommer snart ...') }}</h1>
      </div>
    </Card>
  </Layout>
</template>
<script>
import Layout from '../components/Layout'
import Card from '../components/Card'

export default {
  components: {
    Layout,
    Card
  },
  nuxtI18n: {
    paths: {
      en: '/blog',
      nb: '/blogg'
    }
  }
}
</script>
