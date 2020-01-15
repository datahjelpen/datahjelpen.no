<style lang="scss" module>
.root {
  margin: $space-large auto;
}

.card {
  margin: 0 auto;
  width: #{$size-base * 28}em;
  max-width: 100%;
}

.formGroup {
  width: 100%;
  max-width: 100%;
  margin: $space-base auto 0;
  display: grid;
  grid-template-columns: 1fr;
  grid-gap: $space-tiny;

  @media ($media-min-medium) {
    grid-template-columns: 1fr 2fr;
  }
}

.button {
  display: block;
  width: auto;
  text-align: center;
  margin: $space-base auto 0;
}
</style>
<template>
  <Layout :class="$style.root">
    <Card :class="$style.card">
      <div slot="title">
        <h1>{{ $t('Kontakt oss') }}</h1>
      </div>
      <div slot="content">
        <p>
          <span>E-post:</span>
          <a href="mailto:post@datahjelpen.no">post@datahjelpen.no</a>
        </p>
        <p>
          <span>Telefon:</span>
          <a href="tel:465 31 170">(+47) 465 31 170</a>
        </p>
        <form action="https://formcarry.com/s/GdmTpULmLWB" method="POST">
          <input type="hidden" name="_gotcha" />
          <div :class="$style.formGroup">
            <label>{{ $t('Navn') }}</label>
            <input type="text" name="name" required autofocus />
          </div>
          <div :class="$style.formGroup">
            <label>{{ $t('E-post') }}</label>
            <input type="email" name="email" required />
          </div>
          <div :class="$style.formGroup">
            <label>{{ $t('Melding') }}</label>
            <textarea name="message" rows="5" required></textarea>
          </div>
          <div :class="$style.button">
            <button class="button button-primary">{{ $t('Send') }}</button>
          </div>
        </form>
      </div>
    </Card>
  </Layout>
</template>
<script>
import Layout from '../components/Layout'
import Card from '../components/Card'

export default {
  head: {
    title: 'Kontakt oss - Datahjelpen AS'
  },
  components: {
    Layout,
    Card
  },
  nuxtI18n: {
    paths: {
      en: '/contact',
      nb: '/kontakt'
    }
  }
}
</script>
