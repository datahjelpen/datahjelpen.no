<template>
  <Layout type="text" margin>
    <PrivacyText />
  </Layout>
</template>
<script>
import Layout from '../../components/Layout'
import PrivacyText from '../../components/PrivacyText'

export default {
  head: {
    title: 'Personvernerklæring - Datahjelpen AS'
  },
  components: {
    Layout,
    PrivacyText
  },
  nuxtI18n: {
    paths: {
      en: '/privacy',
      nb: '/personvern'
    }
  }
}
</script>
