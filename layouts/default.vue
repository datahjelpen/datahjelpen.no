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

      <a slot="projectLinks" href="#">Nettside for BEWA</a>
      <a slot="projectLinks" href="#">Nettbutikk for Takshop</a>
      <a slot="projectLinks" href="#">Bewa Cloud</a>
      <a slot="projectLinks" href="#">Gourmethuset</a>

      <a
        slot="someLinks"
        href="https://twitter.com/datahjelpen_no"
        rel="noreferrer noopener"
        >Twitter</a
      >
      <a
        slot="someLinks"
        href="https://www.linkedin.com/company/datahjelpen"
        rel="noreferrer noopener"
        >LinkedIn</a
      >
      <a
        slot="someLinks"
        href="https://www.instagram.com/datahjelpen.no/"
        rel="noreferrer noopener"
        >Instagram</a
      >
      <a
        slot="someLinks"
        href="https://www.facebook.com/datahjelpen.no"
        rel="noreferrer noopener"
        >Facebook</a
      >
      <a
        slot="someLinks"
        href="https://github.com/datahjelpen"
        rel="noreferrer noopener"
        >GitHub</a
      >

      <nuxt-link slot="etcLinks" :to="switchLocalePath('nb')">
        <i18nNoIcon/><span>Norsk</span>
      </nuxt-link>
      <nuxt-link slot="etcLinks" :to="switchLocalePath('en')">
        <i18nEnIcon/><span>English</span>
      </nuxt-link>

      <div slot="contactLinks">
        <p>
          <strong>E-post:</strong>
          <span>post@datahjelpen.no</span>
        </p>
        <p>
          <strong>Telefon:</strong>
          <span>465 31 170</span>
        </p>
      </div>
      <div slot="contactLinks">
        <p><strong>Sandefjord</strong></p>
        <p>Rosenlundveien 1,</p>
        <p>3225 Sandefjord</p>
      </div>
    </NavigationBar>
    <main id="main" :class="$style.main">
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
import i18nNoIcon from '~/assets/icons/no.svg?inline'
import i18nEnIcon from '~/assets/icons/uk.svg?inline'
import AOSCSS from 'aos/dist/aos.css'
import AOS from 'aos'

if (process.client) {
  AOS.init({
    mirror: false,
    once: true,
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
    MenuIcon,
    i18nNoIcon,
    i18nEnIcon
  }
}
</script>
