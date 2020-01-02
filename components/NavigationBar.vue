<style lang="scss" module>
@import 'NavigationBar';
</style>
<template>
  <nav
    :id="id"
    :class="$style.root"
    :aria-expanded="this.$store.state.navigation.navExtended ? 'true' : 'false'"
    v-bind="$attrs"
  >
    <div :class="$style.backdrop" @click="toggleMenu"></div>
    <div :class="$style.inner">
      <div :class="$style.logo">
        <slot name="logo" />
      </div>
      <div :class="$style.mainLinks">
        <slot name="links" />
      </div>
      <a class="visually-hidden" aria-hidden="false" href="#main">{{
        $t('Hopp over kollapset navigasjonsmeny, gå til innhold')
      }}</a>
      <button
        :class="$style.toggle"
        @click="toggleMenu"
        :aria-label="$t('Åpne kollapset navigasjonsmeny')"
      >
        <slot name="toggle" />
      </button>
      <div :class="$style.megaMenu">
        <div :class="$style.megaMenuInner">
          <div :class="$style.topBar">
            <div :class="$style.logo">
              <slot name="logo" />
            </div>
            <button
              :class="$style.close"
              @click="toggleMenu"
              :aria-label="$t('Lukk navigasjonsmeny')"
            >
              <CloseIcon />
            </button>
          </div>
          <div :class="$style.megaMenuMainLinks">
            <slot name="links" />
          </div>
          <div :class="$style.megaMenuOtherLinks">
            <div :class="$style.megaMenuOtherLinksGroup" v-if="$slots.projectLinks">
              <h2>{{ $t('Prosjekter') }}</h2>
              <slot name="projectLinks" />
            </div>
            <div :class="$style.megaMenuOtherLinksGroup" v-if="$slots.etcLinks">
              <h2>{{ $t('Diverse') }}</h2>
              <slot name="etcLinks" />
            </div>
            <div :class="$style.megaMenuOtherLinksGroup" v-if="$slots.someLinks">
              <h2>{{ $t('Sosiale medier') }}</h2>
              <slot name="someLinks" />
            </div>
            <div :class="$style.megaMenuOtherLinksGroup" v-if="$slots.contactLinks">
              <h2>{{ $t('Kontakt') }}</h2>
              <slot name="contactLinks" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>
</template>
<script>
import CloseIcon from '~/assets/icons/close.svg?inline'

export default {
  components: {
    CloseIcon
  },
  methods: {
    toggleMenu() {
      this.$store.commit('navigation/toggle')

      // Hide scrollbar. Also add padding to prevent page moving
      if (window && document) {
        let scrollBarWidth =
          window.innerWidth - document.documentElement.clientWidth

        if (scrollBarWidth > 30) {
          scrollBarWidth = 15
        }

        const navBarElement = document.querySelector('#' + this.id)
        let focusElement = navBarElement

        if (this.$store.state.navigation.navExtended) {
          document.body.style.overflow = 'hidden'
          document.body.style.paddingRight = scrollBarWidth + 'px'
          focusElement = navBarElement.querySelector('.' + this.$style.close)
        } else {
          document.body.style.overflow = ''
          document.body.style.paddingRight = ''
          focusElement = navBarElement.querySelector('.' + this.$style.toggle)
        }

        focusElement.focus()
      }
    }
  },
  watch: {
    $route() {
      // Make sure the sidebar closes when route changes
      if (this.$store.state.navigation.navExtended) {
        this.$store.commit('navigation/toggle')
      }
    }
  },
  props: {
    id: {
      type: String,
      required: true
    }
  }
}
</script>
