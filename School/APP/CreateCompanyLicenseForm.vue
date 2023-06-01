<template>
    <div class="flex flex-wrap gap-8 p-4">
        <div v-if="company" class="grid gap-4 w-full">
            <h2 v-text="$t('license.list.companyCreate')"/>

            <div>
                <div class="text--small" v-text="$t('license.list.companyName')"/>
                <input-text class="flex-grow" v-model="company.name"/>
            </div>

            <div>
                <div class="text--small" v-text="$t('license.list.companyType')"/>
                <input-select class="flex-grow" v-model="company.type" :options="companyTypeOptions"/>
            </div>

            <div>
                <div class="text--small" v-text="$t('license.list.companyNote')"/>
                <input-textarea class="flex-grow" v-model="company.note"/>
            </div>

            <div>
                <div class="text--small" v-text="$t('license.list.companyLicense')"/>
                <input-switch class="flex-grow" v-model="company.license"/>
            </div>
        </div>
        <div class="grid gap-4 w-full" v-if="user">
            <h2 v-text="$t('license.list.companyFirstuser')"/>

            <div>
                <div class="text--small" v-text="$t('license.list.userFirstname')"/>
                <input-text v-model="user.firstname" class="flex-grow"/>
            </div>

            <div>
                <div class="text--small" v-text="$t('license.list.userMiddlename')"/>
                <input-text v-model="user.middlename" class="flex-grow"/>
            </div>

            <div>
                <div class="text--small" v-text="$t('license.list.userLastname')"/>
                <input-text v-model="user.lastname" class="flex-grow"/>
            </div>

            <div>
                <div class="text--small" v-text="$t('license.list.userGender')"/>
                <input-select v-model="user.gender" class="flex-grow" :options="userGenderTypes"/>
            </div>

            <div>
                <div class="text--small" v-text="$t('license.list.userEmail')"/>
                <input-text v-model="user.email" class="flex-grow"/>
            </div>
        </div>
    </div>
</template>

<script lang="ts">
    import { Component, Prop, Vue } from 'vue-property-decorator'
    import { Company } from '@/api/model/company'
    import { availableCompanyTypes, availableGenders } from '@/api/types'
    import { User } from '@/api/model/user'

    @Component
    export default class CreateCompanyLicenseForm extends Vue {
        @Prop({ type: User }) user!: User
        @Prop({ type: Company }) company!: Company
        get companyTypeOptions(): Array<{ label: string, value: string }> {
            return availableCompanyTypes().map(value => {
                return {
                    label: this.$t(`company-type.${ value }`).toString(),
                    value,
                }
            })
        }

        get userGenderTypes(): Array<{ label: string, value: string }> {
            return availableGenders().map(value => {
                return {
                    label: this.$t(`gender.${ value }`).toString(),
                    value,
                }
            })
        }
    }
</script>

