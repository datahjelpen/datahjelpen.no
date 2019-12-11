<style lang="scss" module>
@import 'default';
</style>
<template>
  <div>
    <nav>
      <Logo />
      <div>
        <nuxt-link :to="localePath('index')">{{ $t('nav.home') }}</nuxt-link>
        <nuxt-link :to="localePath('cases')">{{ $t('nav.cases') }}</nuxt-link>
        <nuxt-link :to="localePath('services')">{{
          $t('nav.services')
        }}</nuxt-link>
        <nuxt-link :to="localePath('contact')">{{
          $t('nav.contact')
        }}</nuxt-link>
        <nuxt-link :to="localePath('about')">{{ $t('nav.about') }}</nuxt-link>
        <nuxt-link :to="localePath('blog')">{{ $t('nav.blog') }}</nuxt-link>
      </div>
      <div>
        <nuxt-link :to="switchLocalePath('nb')">🇳🇴</nuxt-link>
        <nuxt-link :to="switchLocalePath('en')">🇬🇧</nuxt-link>
      </div>
    </nav>
    <main>
      <nuxt />
    </main>
    <footer>
      <a>Link 1</a>
      <a>Link 2</a>
      <a>Link 3</a>
    </footer>
  </div>
</template>
<script>
import Logo from '~/components/Logo'

export default {
  components: {
    Logo
  }
}
</script>
