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
        <form action="https://formcarry.com/s/GdmTpULmLWB" method="POST" @submit="submit">
          <input type="hidden" name="_gotcha" />
          <div :class="$style.formGroup">
            <label>{{ $t('Navn') }}</label>
            <input type="text" name="name" required autofocus />
          </div>
          <div :class="$style.formGroup">
            <label>{{ $t('E-post') }}</label>
            <input v-model="email" type="email" name="email" @blur="emailBlur" required />
          </div>
          <div :class="$style.formGroup">
            <label>{{ $t('Melding') }}</label>
            <textarea name="message" rows="5" required></textarea>
          </div>
          <div :class="$style.formGroup" v-if="mathEq.check">
            <span></span>
            <p><strong>For å forhindre spam trenger vi at du besvarer følgende mattestykke:</strong></p>
            <span></span>
            <label>{{ $t('Hva er') + ' ' + mathEq.nr1 + '+' + mathEq.nr2 + '?' }}</label>
            <span></span>
            <input v-model="mathEq.input" type="text" inputmode="numeric" required />
            <span></span>
            <p>{{ mathEqMessage }}</p>
          </div>
          <div :class="$style.button">
            <button class="button button-primary" :disabled="mathEq.check && !mathEqIsCorrect">{{ $t('Send') }}</button>
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
  data() {
    const mathEqNr1 = Math.floor(Math.random() * 5) + 1
    const mathEqNr2 = Math.floor(Math.random() * 5) + 1

    return {
      email: null,
      mathEq: {
        check: false,
        input: null,
        nr1: mathEqNr1,
        nr2: mathEqNr2,
        ans: mathEqNr1 + mathEqNr2
      }
    }
  },
  methods: {
    emailBlur() {
      this.mathEq.check = this.email !== null && this.email.indexOf('.no') === -1
    },
    submit(event) {
      event.preventDefault()

      if (this.mathEq.check && !this.mathEqIsCorrect) {
        return false
      }

      if (
        this.email !== null &&
        (this.email.indexOf('@datahjelpen.no') !== -1 || this.email.indexOf('@datahjelpen.org') !== -1)
      ) {
        alert(this.$t('Du kan ikke sende fra en av Datahjelpen sine e-post addresser.'))
        return false
      }

      event.target.submit()
    }
  },
  computed: {
    mathEqIsCorrect() {
      return +this.mathEq.input === +this.mathEq.ans
    },
    mathEqMessage() {
      let message = ''

      if (this.mathEq.input !== null) {
        if (this.mathEqIsCorrect) {
          message = this.$t('Korrekt!')
        } else {
          message = this.$t('Ditt svar stemmer ikke.')
        }
      }

      return message
    }
  },
  nuxtI18n: {
    paths: {
      en: '/contact',
      nb: '/kontakt'
    }
  }
}
</script>
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
