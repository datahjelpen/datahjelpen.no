<style lang="scss" module>
.root {
  width: 100%;
  height: 100%;

  & > svg,
  & > figure {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    display: block;
    width: 100%;
    height: 100%;
  }
}

.root svg:not(:root) {
  overflow: hidden;
}

.figure {
  margin: 0;
  width: 100%;
  height: 100%;

  @media ($media-min-medium) {
    height: 1000px;
    -webkit-clip-path: url('#masked-image');
    clip-path: url('#masked-image');
  }
}

.img {
  display: none;
  width: 100%;
  height: 1000px;
  object-fit: cover;

  @media ($media-min-medium) {
    display: block;
  }
}

.imgMobile {
  width: 100%;
  height: 100%;
  object-fit: cover;
  filter: grayscale(100%) contrast(130%) brightness(500%);
  opacity: 0.15;

  @media ($media-min-medium) {
    display: none;
  }
}
</style>
<template>
  <div :class="$style.root">
    <svg
      xmlns="http://www.w3.org/2000/svg"
      xmlns:xlink="http://www.w3.org/1999/xlink"
      viewBox="0 0 1000 1000"
      class="no-mobile-animate"
    >
      <defs>
        <clipPath :id="id">
          <path fill="black" :d="shape0">
            <animate
              repeatCount="indefinite"
              attributeName="d"
              :dur="duration"
              :values="shape.values"
            ></animate>
          </path>
        </clipPath>
      </defs>
    </svg>

    <figure :class="$style.figure">
      <img :class="$style.img" :src="image" :alt="alt" />
      <img
        :class="$style.imgMobile"
        :src="imageMobile ? imageMobile : image"
        :alt="altMobile ? altMobile : alt"
      />
    </figure>
  </div>
</template>
<script>
export default {
  data() {
    return {
      shape0:
        'M190 15C134 42 99 84 66 153c-32 66-52 89-46 159 2 27 71 192 80 225 28 99-148 168-38 338 62 95 249-8 369 10 136 21 263 45 363 13 125-40 142-161 189-263 92-196 71-437-83-567-96-81-119 62-304 35C406 75 290-34 190 15z',
      shape1:
        'M200 6C138 23 78 43 44 112 13 177-4 212 1 282c2 27 98 253 107 286 28 99-137 154-27 323 61 96 251-51 370-33 137 21 254 90 355 59 124-40 135-228 183-330 91-196 62-380-93-511-95-81-118 63-304 36C403 84 313-24 200 6z',
      shape2:
        'M175 27c-47 43-45 118-79 187-31 65-55 72-50 142 2 27 34 103 43 136 27 99-164 189-54 358 61 96 247 56 366 74 137 21 277-22 377-54 124-39 149-64 197-166 91-196 84-518-71-649-95-81-118 63-304 36C411 63 257-49 175 27z',
      shape3:
        'M166 23C112 53 87 95 54 164 22 229-4 268 1 337c2 27 55 156 69 187 42 99-92 169 18 339 61 95 236 15 356 34 136 20 236 79 336 47 124-40 153-195 201-298 91-195 64-444-90-574-96-81-144 33-330 6C372 50 263-30 166 23z',
      shape4:
        'M131 40C84 84 97 148 63 217 32 283-4 325 1 394c2 28 11 56 29 86 57 98-45 183 65 353 61 96 222 85 341 103 137 21 217 68 318 36 124-40 171-162 219-264 91-196 66-510-89-641-95-81-169 3-355-24-189-28-316-79-398-3z'
    }
  },
  computed: {
    shape() {
      return {
        values:
          this.shape0 +
          ';' +
          this.shape1 +
          ';' +
          this.shape2 +
          ';' +
          this.shape3 +
          ';' +
          this.shape4 +
          ';' +
          this.shape0
      }
    }
  },
  props: {
    duration: {
      type: String,
      default: '15s'
    },
    id: {
      type: String,
      default: 'masked-image'
    },
    image: {
      type: String,
      required: true
    },
    imageMobile: {
      type: String,
      required: false
    },
    alt: {
      type: String,
      default: '',
      required: false
    },
    altMobile: {
      type: String,
      default: '',
      required: false
    }
  }
}
</script>
