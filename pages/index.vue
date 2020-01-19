<style lang="scss" module>
@import 'index';
</style>
<template>
  <div :class="$style.root">
    <Layout type="full">
      <header id="particles-js" :class="$style.header">
        <div :class="$style.headerInner" v-if="header">
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
              <nuxt-link
                class="button button-primary"
                :to="header.buttonPrimary.link"
                >{{ header.buttonPrimary.text }}</nuxt-link
              >
              <nuxt-link
                class="button button-light"
                :to="header.buttonSecondary.link"
                >{{ header.buttonSecondary.text }}</nuxt-link
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

    <Layout :class="$style.cases" v-if="cases">
      <InfoSection2 :id="cases.sectionNameSlug">
        <div slot="header">
          <h2 data-aos="fade-up" data-aos-delay="1000">
            {{ cases.sectionName }}
          </h2>
          <h3 data-aos="fade-up" data-aos-delay="200">
            {{ cases.sectionTitle }}
          </h3>
        </div>
        <div slot="content" data-aos="fade-up" data-aos-delay="300">
          <p>
            {{ cases.sectionSummary }}
          </p>
        </div>
        <div
          slot="footer"
          data-aos="fade-up"
          data-aos-delay="400"
          data-aos-offset="-100"
        >
          <nuxt-link
            class="button button-primary"
            :to="cases.sectionButton.link"
            >{{ cases.sectionButton.text }}</nuxt-link
          >
        </div>
        <MasonryGrid slot="items">
          <ProjectCard
            v-for="(customerCase, slug, i) in cases.items"
            :slot="'item-' + (i + 1)"
            :key="'customerCase-card-' + i"
            :title="customerCase.title"
            :link="
              localePath({
                name: 'case-studies-slug',
                params: { slug: slug }
              })
            "
            :image="customerCase.poster"
            :overlay="customerCase.overlay"
            :overlayHover="customerCase.overlayHover"
            data-aos="zoom-in-up"
            data-aos-delay="0"
          >
          </ProjectCard>
        </MasonryGrid>
      </InfoSection2>
    </Layout>

    <Layout v-if="services">
      <InfoSection1 :id="services.sectionNameSlug">
        <div slot="header">
          <h2 data-aos="fade-up" data-aos-delay="0">
            {{ services.sectionName }}
          </h2>
          <h3 data-aos="fade-up" data-aos-delay="100">
            {{ services.sectionTitle }}
          </h3>
        </div>
        <div slot="content" data-aos="fade-up" data-aos-delay="200">
          <p>
            {{ services.sectionSummary }}
          </p>
        </div>
        <div
          slot="footer"
          data-aos="fade-up"
          data-aos-delay="300"
          data-aos-offset="-100"
        >
          <nuxt-link
            class="button button-primary"
            :to="services.sectionButton.link"
            >{{ services.sectionButton.text }}</nuxt-link
          >
        </div>
        <Card
          v-for="(service, slug, i) in services.items"
          :slot="'item-' + (i + 1)"
          :key="'service-card-' + i"
          :link="
            localePath({
              name: 'services-slug',
              params: { slug: slug }
            })
          "
          data-aos="fade-left"
          :data-aos-delay="i * 100"
        >
          <img slot="icon" :src="service.icon" />
          <h4 slot="title">{{ service.title }}</h4>
        </Card>
      </InfoSection1>
    </Layout>
  </div>
</template>

<script>
import DancingImage from '../components/DancingImage'
import ButtonGroup from '../components/ButtonGroup'
import InfoSection1 from '../components/InfoSection1'
import InfoSection2 from '../components/InfoSection2'
import Card from '../components/Card'
import ProjectCard from '../components/ProjectCard'
import Layout from '../components/Layout'
import MasonryGrid from '../components/MasonryGrid'

let titleInterval

if (process.client) {
  const particlesJS = require('particles.js')
  window.particlesJS.load('particles-js', '/particlesjs-config.json')
}

export default {
  head: {
    title: 'Teknologibyrå - Datahjelpen AS'
  },
  components: {
    DancingImage,
    ButtonGroup,
    InfoSection1,
    InfoSection2,
    Card,
    ProjectCard,
    Layout,
    MasonryGrid
  },
  async asyncData({ app: { $axios, i18n } }) {
    // Get page data
    const [indexRes, servicesRes, casesRes] = await Promise.all([
      $axios.get('/i18n/' + i18n.locale + '/index.json'),
      $axios.get('/i18n/' + i18n.locale + '/services.json'),
      $axios.get('/i18n/' + i18n.locale + '/case-studies.json')
    ]).catch(e => {
      return []
    })

    if (indexRes && typeof indexRes.data === 'object') {
      indexRes.data.services = servicesRes.data
      indexRes.data.cases = casesRes.data

      return { ...indexRes.data }
    }
  },
  mounted() {
    if (typeof this.header === 'object') {
      console.log('run', titleInterval)
      let currentTitle = 0
      this.$store.commit('setHeaderTitle', this.header.titleParts[currentTitle])
      titleInterval = setInterval(() => {
        currentTitle += 1
        if (currentTitle > this.header.titleParts.length - 1) {
          currentTitle = 0
        }
        this.$store.commit(
          'setHeaderTitle',
          this.header.titleParts[currentTitle]
        )
      }, 5000)
    }
  },
  destroyed() {
    clearInterval(titleInterval)
  }
}
</script>
