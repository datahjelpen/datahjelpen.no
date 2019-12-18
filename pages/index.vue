<style lang="scss" module>
@import 'index';
</style>
<template>
  <div :class="$style.root">
    <Layout type="full">
      <header id="particles-js" :class="$style.header">
        <div :class="$style.headerInner">
          <div :class="$style.headerContent">
            <h1 data-aos="fade-up" data-aos-delay="0">
              <span
                v-for="(title, i) in titleParts"
                v-bind:key="'title-' + i"
                >{{ title }}</span
              >
            </h1>
            <p data-aos="fade-up" data-aos-delay="100">{{ intro_text }}</p>
            <ButtonGroup
              data-aos="fade-up"
              data-aos-delay="200"
              :class="$style.headerContentLinks"
            >
              <a
                class="button button-primary"
                :href="'#' + services.sectionNameSlug"
                >Våre tjenester</a
              >
              <a class="button button-light" href="#">Kontakt oss</a>
            </ButtonGroup>
          </div>
          <div
            :class="$style.headerImage"
            data-aos="fade-left"
            data-aos-delay="0"
          >
            <DancingImage
              :image="headerImage"
              :alt="headerImageAlt"
              :imageMobile="headerImageMobile"
              :altMobile="headerImageAltMobile"
            />
          </div>
        </div>
      </header>
    </Layout>
    <div :class="'navigationBarBg ' + $style.navigationBarBg"></div>

    <Layout>
    <InfoSection1 :id="services.sectionNameSlug">
      <div slot="header">
        <h2>{{ services.sectionName }}</h2>
        <h3>
          {{ services.title }}
        </h3>
        <p>
          {{ services.summary }}
        </p>
        <a class="button button-primary" :href="services.button.link">{{
          services.button.text
        }}</a>
      </div>
      <Card
        v-for="(service, i) in services.items"
        :slot="'item-' + (i + 1)"
        :key="'service-card-' + i"
      >
        <img slot="icon" :src="service.icon" />
        <h4 slot="title">{{ service.title }}</h4>
        <p slot="content">
          {{ service.summary }}
        </p>
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
import ServiceIconConsult from '~/assets/icons/consult.svg?raw'
import ServiceIconDevelop from '~/assets/icons/develop.svg?raw'
import ServiceIconDesign from '~/assets/icons/design.svg?raw'
import Card from '../components/Card'

if (process.client) {
  const particlesJS = require('particles.js')
  window.particlesJS.load('particles-js', '/particlesjs-config.json')
}

export default {
  components: {
    DancingImage,
    ButtonGroup,
    InfoSection1,
    Card
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
      headerImage: require('~/assets/test.jpg'),
      headerImageAlt: '',
      headerImageMobile: require('~/assets/header.jpg'),
      headerImageAltMobile: '',
      services: {
        sectionNameSlug: this.$i18n.t('tjenester'),
        sectionName: this.$i18n.t('Tjenester'),
        title: this.$i18n.t('De beste løsningene for din bedrift'),
        summary: this.$i18n.t(
          'Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium blanditiis nulla, magnam qui aperiam vitae porro dolor sit voluptate sunt. Itaque distinctio officiis, voluptatum cumque est magni provident natus a.'
        ),
        button: {
          text: 'Se alle tjenester',
          link: ''
        },
        items: [
          {
            title: this.$i18n.t('Utvikling'),
            summary: this.$i18n.t(
              "Use absolutely no pressure. Just like an angel's wing. Maybe there's a happy little Evergreen that lives here."
            ),
            icon: ServiceIconDevelop
          },
          {
            title: this.$i18n.t('Design'),
            summary: this.$i18n.t(
              "I thought today we would do a happy little picture. Just take out whatever you don't want. It'll change your entire perspective."
            ),
            icon: ServiceIconDesign
          },
          {
            title: this.$i18n.t('Rådgivning'),
            summary: this.$i18n.t(
              "There are no mistakes. You can fix anything that happens. I'm going to mix up a little color."
            ),
            icon: ServiceIconConsult
          }
        ]
      }
    }
  }
}
</script>
