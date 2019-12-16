<style lang="scss" module>
@import 'index';
</style>
<template>
  <div :class="$style.root">
    <header id="particles-js" :class="$style.header">
      <div :class="$style.headerInner">
        <div :class="$style.headerContent">
          <h1 data-aos="fade-up" data-aos-delay="0">
            <span v-for="(title, i) in titleParts" v-bind:key="'title-' + i">{{
              title
            }}</span>
          </h1>
          <p data-aos="fade-up" data-aos-delay="100">{{ intro_text }}</p>
          <ButtonGroup
            data-aos="fade-up"
            data-aos-delay="200"
            :class="$style.headerContentLinks"
          >
            <a class="button button-primary" :href="$t('#tjenester')"
              >Våre tjenester</a
            >
            <a class="button button-blank" href="#">Kontakt oss</a>
          </ButtonGroup>
        </div>
        <div
          :class="$style.headerImage"
          data-aos="fade-left"
          data-aos-delay="0"
        >
          <DancingImage :image="headerImage" />
        </div>
      </div>
    </header>
    <div :class="'navigationBarBg ' + $style.navigationBarBg"></div>

    <ul>
      <li data-aos="fade-up" data-aos-duration="1000" data-aos-delay="500">
        <a href="http://avehtml.liquid-themes.com/index-creative.html"
          >http://avehtml.liquid-themes.com/index-creative.html</a
        >
      </li>
      <li>
        <a href="http://avehtml.liquid-themes.com/portfolio-single-1.html#"
          >http://avehtml.liquid-themes.com/portfolio-single-1.html#</a
        >
      </li>
      <li>
        <a href="http://avehtml.liquid-themes.com/blog-single.html"
          >http://avehtml.liquid-themes.com/blog-single.html</a
        >
      </li>
      <li>
        <a href="http://avehtml.liquid-themes.com/index.html"
          >http://avehtml.liquid-themes.com/index.html</a
        >
      </li>
      <li>
        <a href="http://avehtml.liquid-themes.com/index-seo.html"
          >http://avehtml.liquid-themes.com/index-seo.html</a
        >
      </li>
      <li>
        <a href="http://avehtml.liquid-themes.com/page-about-company.html"
          >http://avehtml.liquid-themes.com/page-about-company.html</a
        >
      </li>
      <li>
        <a href="https://theglyph.studio/service-branding"
          >https://theglyph.studio/service-branding</a
        >
      </li>
      <li><a href="https://expo.io/">https://expo.io/</a></li>
      <li><a href="https://madewithlove.be/">https://madewithlove.be/</a></li>
      <li>
        <a href="https://littlestudio.dk/intro"
          >https://littlestudio.dk/intro</a
        >
      </li>
    </ul>

    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
  </div>
</template>

<script>
import DancingImage from '../components/DancingImage'
import ButtonGroup from '../components/ButtonGroup'

if (process.client) {
  const particlesJS = require('particles.js')

  window.particlesJS.load('particles-js', '/particlesjs-config.json')
}

export default {
  components: {
    DancingImage,
    ButtonGroup
  },
  data() {
    return {
      titleParts: [
        this.$i18n.t('Vi skaper de digitale'),
        this.$i18n.t('opplevelsene folk elsker')
      ],
      intro_text: this.$i18n.t(
        'We believe that designing products and services in close partnership with our clients is the only way to have a real impact on their business.'
      ),
      headerImage: require('~/assets/test.jpg')
    }
  }
}
</script>
