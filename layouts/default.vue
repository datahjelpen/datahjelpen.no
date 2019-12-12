<style lang="scss" module>
@import 'default';
</style>
<style lang="scss">
// Hide home link when its active
.nuxt-link-home.nuxt-link-exact-active {
  display: none;
}
</style>
<template>
  <div>
    <NavigationBar :class="$style.navigationBar">
      <nuxt-link slot="logo" :to="localePath('index')">
        <Logo />
      </nuxt-link>
      <nuxt-link
        class="nuxt-link-home"
        slot="links"
        :to="localePath('index')"
        >{{ $t('nav.home') }}</nuxt-link
      >
      <nuxt-link slot="links" :to="localePath('cases')">{{
        $t('nav.cases')
      }}</nuxt-link>
      <nuxt-link slot="links" :to="localePath('services')">{{
        $t('nav.services')
      }}</nuxt-link>
      <nuxt-link slot="links" :to="localePath('contact')">{{
        $t('nav.contact')
      }}</nuxt-link>
      <nuxt-link slot="links" :to="localePath('about')">{{
        $t('nav.about')
      }}</nuxt-link>
      <nuxt-link slot="links" :to="localePath('blog')">{{
        $t('nav.blog')
      }}</nuxt-link>
      <MenuIcon slot="toggle" />
      <nuxt-link slot="links" :to="switchLocalePath('nb')">🇳🇴</nuxt-link>
      <nuxt-link slot="links" :to="switchLocalePath('en')">🇬🇧</nuxt-link>
    </NavigationBar>
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
import NavigationBar from '~/components/NavigationBar'
import MenuIcon from '~/assets/icons/menu.svg?inline'
import AOSCSS from 'aos/dist/aos.css'
import AOS from 'aos'

if (process.client) {
  AOS.init()
}

export default {
  components: {
    Logo,
    NavigationBar,
    MenuIcon
  }
}
</script>
