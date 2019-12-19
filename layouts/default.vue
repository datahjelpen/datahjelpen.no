<style lang="scss" module>
@import 'default';
</style>
<style lang="scss">
// Hide home link when its active
.nuxt-link-home.nuxt-link-exact-active {
  display: none;
}
</style>
<style lang="scss">
// bg for navbar
.navigationBarBg {
  position: sticky;
  top: 0;
  left: 0;
  right: 0;
  background-color: white;
  width: 100%;
  height: #{$size-medium + $size-tiny * 2 + $size-small}em;
  z-index: 2;
}
</style>
<template>
  <div>
    <a class="visually-hidden" aria-hidden="false" href="#main">{{
      $t('Hopp over menyen, gå til innhold')
    }}</a>
    <NavigationBar id="main-nav" :class="$style.navigationBar">
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
      <!-- <nuxt-link slot="links" :to="switchLocalePath('nb')">🇳🇴</nuxt-link>
      <nuxt-link slot="links" :to="switchLocalePath('en')">🇬🇧</nuxt-link> -->
    </NavigationBar>
    <main id="main">
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
  AOS.init({
    duration: 300,
    debounceDelay: 200, // the delay on debounce used while resizing window (advanced)
    throttleDelay: 200 // the delay on throttle used while scrolling the page (advanced)
  })

  if (document) {
    const mainNav = document.querySelector('#main-nav')
    const mainNavBg = document.querySelector('.navigationBarBg')

    if (mainNav && !mainNavBg) {
      const mainNavBgDefault = document.createElement('div')
      mainNavBgDefault.classList.add('navigationBarBg')
      mainNav.style.backgroundColor = 'white'
      // mainNav.parentElement.insertBefore(mainNavBgDefault, mainNav)
    }
  }
}

export default {
  components: {
    Logo,
    NavigationBar,
    MenuIcon
  }
}
</script>
