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
      <nuxt-link slot="links" :to="localePath('case-studies')">{{
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

      <nuxt-link
        slot="projectLinks"
        :to="
          localePath({
            name: 'case-studies-slug',
            params: { slug: '2019-bewa-no' }
          })
        "
        >Nettside for BEWA</nuxt-link
      >
      <nuxt-link
        slot="projectLinks"
        :to="
          localePath({
            name: 'case-studies-slug',
            params: { slug: '2019-takshop-no' }
          })
        "
      >
        Nettbutikk for Takshop</nuxt-link
      >
      <nuxt-link
        slot="projectLinks"
        :to="
          localePath({
            name: 'case-studies-slug',
            params: { slug: '2019-bewa-cloud' }
          })
        "
      >
        Bewa Cloud</nuxt-link
      >
      <nuxt-link
        slot="projectLinks"
        :to="
          localePath({
            name: 'case-studies-slug',
            params: { slug: '2019-gourmethuset-no' }
          })
        "
      >
        Nettbuikk for kjøkkenutstyr og gourmet</nuxt-link
      >

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
        <i18nNoIcon /><span>Norsk</span>
      </nuxt-link>
      <nuxt-link slot="etcLinks" :to="switchLocalePath('en')">
        <i18nEnIcon /><span>English</span>
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
    <footer :class="$style.footer">
      <div :class="$style.footerContent">
        <section>
          <div>
            <div :class="$style.footerLinks1">
              <a href="https://datahjelpen.no#services">Tjenester</a>
              <a href="https://datahjelpen.no#projects">Prosjekter</a>
              <a href="https://datahjelpen.no/kontakt">Kontakt</a>
              <a href="https://datahjelpen.no/om">Om oss</a>
              <a href="https://datahjelpen.no/blogg">Blogg</a>
            </div>
            <div :class="$style.footerLinksSocial">
              <a href="https://fb.com/datahjelpen.no"
                ><svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  class="feather feather-facebook icon"
                >
                  <path
                    d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"
                  ></path></svg
              ></a>
              <a href="https://instagr.am/datahjelpen.no"
                ><svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  class="feather feather-instagram icon"
                >
                  <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                  <path
                    d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"
                  ></path>
                  <line x1="17.5" y1="6.5" x2="17.5" y2="6.5"></line></svg
              ></a>
              <a href="https://twitter.com/datahjelpen_no"
                ><svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  class="feather feather-twitter icon"
                >
                  <path
                    d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"
                  ></path></svg
              ></a>
              <a href="https://www.linkedin.com/company/datahjelpen"
                ><svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  class="feather feather-linkedin icon"
                >
                  <path
                    d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"
                  ></path>
                  <rect x="2" y="9" width="4" height="12"></rect>
                  <circle cx="4" cy="4" r="2"></circle></svg
              ></a>
              <a href="https://github.com/datahjelpen"
                ><svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  class="feather feather-github icon"
                >
                  <path
                    d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"
                  ></path></svg
              ></a>
            </div>
            <div :class="$style.footerExtraInfo">
              <p>Org nr: 917 406 626</p>
            </div>
          </div>
          <div>
            <div :class="$style.footerContact">
              <p><strong>Kontakt</strong></p>
              <p>
                <span>E-post: </span
                ><a href="mailto:post@datahjelpen.no">post@datahjelpen.no</a>
              </p>
              <p><span>Telefon:</span><a href="tlf:46531170">465 31 170</a></p>
            </div>
          </div>
          <div>
            <div :class="$style.footerLocation">
              <p><strong>Sandefjord</strong></p>
              <p>Rosenlundveien 1,</p>
              <p>3225 Sandefjord</p>
            </div>
          </div>
        </section>
        <section>
          <div :class="$style.footerCopyright">
            <p>
              © Copyright 2016-{{ new Date().getFullYear() }} - Datahjelpen AS
            </p>
          </div>
        </section>
      </div>
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
