<template>
  <div>
    <logo />
    <h1 class="title">{{thing}}</h1>
    <h2 class="subtitle">{{ $t('hello') }}</h2>
    <div class="links">
      <nuxt-link :to="localePath('about')">About</nuxt-link>
    </div>
  </div>
</template>

<script>
import Logo from '~/components/Logo'

export default {
  async asyncData({ $axios }) {
    // const thing = await $axios.$get('')
    const thing = 'Datahjelpen'
    return { thing }
  },

  components: {
    Logo
  }
}
</script>
