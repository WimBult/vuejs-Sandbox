<template>
    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" stroke="currentColor"  :height="size" :width="size" viewBox="0 96 960 960">
        <path d="m270 866-124-25q-11-2-18.5-11.5T122 808l14-120-79-92q-8-8-8-20t8-20l79-91-14-120q-2-12 5.5-21.5T146 312l124-25 62-107q6-10 17-14t22 1l109 51 109-51q11-5 22.5-2t16.5 14l63 108 123 25q11 2 18.5 11.5T838 345l-14 120 79 91q8 8 8 20t-8 20l-79 92 14 120q2 12-5.5 21.5T814 841l-123 25-63 107q-5 11-16.5 14t-22.5-2l-109-51-109 51q-11 5-22 1t-17-14l-62-106Zm210-290Zm-64 112q9 9 21 9t21-9l185-183q8-8 7.5-20.5T641 463q-9-9-21.5-8.5T597 464L437 623l-73-77q-9-10-22.5-9.5T319 547q-9 10-9.5 23t9.5 22l97 96Zm-43 229 107-45 110 45 67-100 117-30-12-119 81-92-81-94 12-119-117-28-69-100-108 45-110-45-67 100-117 28 12 119-81 94 81 92-12 121 117 28 70 100Z"/>
        <circle cx="11.999" cy="12.001" r="4.5" class="a"/>
    </svg>
</template>

<script lang="ts">
    import { Prop, Component, Vue } from 'vue-property-decorator'

    @Component
    export default class IconLicense extends Vue {
        @Prop({ type: Number, default: 50 }) readonly size!: number
    }
</script>

