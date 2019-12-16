<style lang="scss" module>
@import 'NavigationBar';
</style>
<template>
  <nav
    :class="$style.root"
    :aria-expanded="this.$store.state.navigation.navExtended ? 'true' : 'false'"
    v-bind="$attrs"
  >
    <div :class="$style.inner">
      <div :class="$style.logo">
        <slot name="logo" />
      </div>
      <div :class="$style.mainLinks">
        <slot name="links" />
      </div>
      <div :class="$style.toggle" @click="toggleMenu">
        <slot name="toggle" />
      </div>
      <div :class="$style.megaMenu">
        <div :class="$style.megaMenuInner">
          <div :class="$style.topBar">
            <div :class="$style.logo">
              <slot name="logo" />
            </div>
            <div :class="$style.close" @click="toggleMenu">
              <CloseIcon />
            </div>
          </div>
          <div :class="$style.megaMenuMainLinks">
            <slot name="links" />
          </div>
          <div :class="$style.megaMenuOtherLinks">
            <div :class="$style.megaMenuOtherLinksGroup">
              <h2>{{ $t('Prosjekter') }}</h2>
              <slot name="links" />
            </div>
            <div :class="$style.megaMenuOtherLinksGroup">
              <h2>{{ $t('Diverse') }}</h2>
              <slot name="links" />
            </div>
            <div :class="$style.megaMenuOtherLinksGroup">
              <h2>{{ $t('Sosiale medier') }}</h2>
              <slot name="links" />
            </div>
            <div :class="$style.megaMenuOtherLinksGroup">
              <h2>{{ $t('Kontakt') }}</h2>
              <slot name="links" />
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

        if (this.$store.state.navigation.navExtended) {
          document.body.style.overflow = 'hidden'
          document.body.style.paddingRight = scrollBarWidth + 'px'
        } else {
          document.body.style.overflow = ''
          document.body.style.paddingRight = ''
        }
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
  }
}
</script>
