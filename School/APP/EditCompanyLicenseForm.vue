<template>
    <card class="grid gap-8" v-if="company">
        <div>
            <div class="text--small" v-text="$t('forms.edit-company-form.name')" />
            <input-text v-model="company.name" />
        </div>

        <div>
            <div class="text--small" v-text="$t('license.list.UUID')" />
            <input-text readonly :value="company.id" />
        </div>

        <div>
            <div class="text--small" v-text="$t('license.title')" />
            <input-switch class="flex-grow" v-model="company.license"/>
        </div>

        <div>
            <div class="text--small" v-text="$t('license.list.notes')" />
            <input-textarea v-model="company.note" />
        </div>

        <div>
            <kv-button :title="$t('license.list.editCompany')" @click="save" textual md/>
        </div>
    </card>
</template>

<script lang="ts">
    import { Prop, Component, Vue } from 'vue-property-decorator'
    import { Company } from '@/api/model/company'
    import InputDate from '@/components/input/InputDate.vue'
    import moment from 'moment'
    import IconPlus from '@/components/icons/IconPlus.vue'
    import { LicenseAPI } from '@/api/backend-client'

    @Component({
        components: { IconPlus, InputDate },
    })
    export default class EditCompanyLicenseForm extends Vue {
        @Prop({ required: true }) readonly company!: Company
        loading: boolean = false
        submitting: boolean = false

        async save(company: Company) {
            try {
                this.loading = true
                this.submitting = true
                await LicenseAPI.update(this.company)
            } finally {
                this.loading = false
                this.submitting = false
                this.$emit('save', this.company)
                this.$emit('close', this.company)
            }
        }

        formatDate(date: Date) {
            return moment(date).format('DD MMMM YYYY')
        }
    }
</script>
