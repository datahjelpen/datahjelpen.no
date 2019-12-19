<style lang="scss" module>
@import 'index';
</style>
<template>
  <div :class="$style.root">
    <Layout type="full">
      <header id="particles-js" :class="$style.header">
        <div :class="$style.headerInner">
          <div :class="$style.headerContent">
            <h1>
              <span
                data-aos="fade-up"
                :data-aos-delay="50 * i"
                v-for="(title, i) in this.$store.state.headerTitle"
                v-bind:key="'title-' + i"
                >{{ title }}</span
              >
            </h1>
            <p data-aos="fade-up" data-aos-delay="100" data-aos-offset="-100">
              {{ header.introText }}
            </p>
            <ButtonGroup
              data-aos="fade-up"
              data-aos-delay="200"
              data-aos-offset="-200"
              :class="$style.headerContentLinks"
            >
              <a
                class="button button-primary"
                :href="header.buttonPrimary.link"
                >{{ header.buttonPrimary.text }}</a
              >
              <a
                class="button button-light"
                :href="header.buttonSecondary.link"
                >{{ header.buttonSecondary.text }}</a
              >
            </ButtonGroup>
          </div>
          <div
            :class="$style.headerImage"
            data-aos="fade-left"
            data-aos-delay="0"
          >
            <DancingImage
              :image="header.image"
              :alt="header.imageAlt"
              :imageMobile="header.imageMobile"
              :altMobile="header.imageAltMobile"
            />
          </div>
        </div>
      </header>
    </Layout>

    <div :class="'navigationBarBg ' + $style.navigationBarBg"></div>

    <Layout>
      <InfoSection1 :id="services.sectionNameSlug">
        <div slot="header">
          <h2 data-aos="fade-up" data-aos-delay="0">
            {{ services.sectionName }}
          </h2>
          <h3 data-aos="fade-up" data-aos-delay="100">
            {{ services.title }}
          </h3>
        </div>
        <div slot="content" data-aos="fade-up" data-aos-delay="200">
          <p>
            {{ services.summary }}
          </p>
        </div>
        <div
          slot="footer"
          data-aos="fade-up"
          data-aos-delay="300"
          data-aos-offset="-100"
        >
          <a class="button button-primary" :href="services.button.link">{{
            services.button.text
          }}</a>
        </div>
        <Card
          v-for="(service, i) in services.items"
          :slot="'item-' + (i + 1)"
          :key="'service-card-' + i"
          :link="service.link"
          data-aos="fade-left"
          :data-aos-delay="i * 100"
        >
          <img slot="icon" :src="service.icon" />
          <h4 slot="title">{{ service.title }}</h4>
          <p slot="content">
            {{ service.summary }}
          </p>
          <a class="link link-styled" :href="service.link" slot="link">{{
            service.linkText
          }}</a>
        </Card>
      </InfoSection1>
    </Layout>

    <ul>
      <li>
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
  </div>
</template>

<script>
import DancingImage from '../components/DancingImage'
import ButtonGroup from '../components/ButtonGroup'
import InfoSection1 from '../components/InfoSection1'
import Card from '../components/Card'
import Layout from '../components/Layout'

if (process.client) {
  const particlesJS = require('particles.js')
  window.particlesJS.load('particles-js', '/particlesjs-config.json')
}

export default {
  components: {
    DancingImage,
    ButtonGroup,
    InfoSection1,
    Card,
    Layout
  },
  async asyncData({ app: { $axios, i18n } }) {
    const url = '/i18n/' + i18n.locale + '/index.json'
    const data = await $axios.get(url).then(res => {
      return res.data
    })

    data.headerImage = data.headerImage
    data.headerImageMobile = data.headerImageMobile

    return { ...data }
  },
  created() {
    let currentTitle = 0
    this.$store.commit('setHeaderTitle', this.header.titleParts[currentTitle])
    // setInterval(() => {
    //   currentTitle += 1
    //   if (currentTitle > this.headerTitleParts.length - 1) {
    //     currentTitle = 0
    //   }
    //   this.$store.commit('setHeaderTitle', this.headerTitleParts[currentTitle])
    // }, 4000)
  }
}
</script>
