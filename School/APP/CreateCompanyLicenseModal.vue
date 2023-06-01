<template>
    <validation-observer v-slot="{ valid }" slim>
        <modal v-model="visible" min-width="640px" slim>
            <create-company-license-form
                :formTitle="$t('license.title')"
                :company="company"
                :user="user"
            />

            <template #actions>
                <div class="flex gap-4">
                    <kv-button
                        :disabled="!valid"
                        :title="$t('license.list.cancel')"
                        textual
                        @click="cancel"
                    />

                    <kv-button
                        :disabled="!valid"
                        :title="$t('license.list.create')"
                        @click="create"
                    />
                </div>
            </template>
        </modal>
    </validation-observer>
</template>

<script lang="ts">
    import { Watch, Component, Prop, Vue } from 'vue-property-decorator'
    import user from '@/router/routes/user'
    import { Company } from '@/api/model/company'
    import { v4 as uuid } from 'uuid'
    import { User } from '@/api/model/user'
    import { DashboardView, Gender, Role } from '@/api/types'
    import { LicenseAPI } from '@/api/backend-client'

    @Component
    export default class CreateCompanyLicenseModal extends Vue {
        @Prop({ type: Boolean, default: false }) value!: boolean
        visible: boolean = false
        submittingCreateCompanyLicense: boolean = false
        user: User = null
        company: Company = null

        @Watch('value')
        onValueChanged(): void {
            this.visible = this.value
        }

        @Watch('visible')
        onVisibleChanged(): void {
            this.$emit('input', this.visible)
        }

        async create(): Promise<void> {
            try {
                await LicenseAPI.create(this.company, this.user)
            } catch (error) {
                this.$notify({
                    group: 'information',
                    type: 'error',
                    text: 'Er is iets fout gegaan, probeer het later nog een keer. Of neem contact op met KeyVue',
                })
            } finally {
                this.visible = false
                this.initFormData()
                this.$emit('create', {
                    company: this.company,
                    user: this.user,
                })
            }
        }

        mounted() {
            this.initFormData()
        }

        initFormData() {
            this.createCompany()
            this.createUser()
        }

        createUser(): void {
            this.user = User.fromData({
                id: uuid(),
                company: this.$currentCompany,
                firstname: null,
                middlename: null,
                lastname: null,
                email: null,
                role: Role.EMPLOYEE,
                birthdate: null,
                gender: Gender.UNKNOWN,
                defaultDashboardView: null,
                branches: [],
            })
        }

        createCompany(): void {
            this.company = Company.fromData({
                company: null,
                id: uuid(),
                companyName: null,
                companyAddress: null,
                companyEmail: null,
                type: null,
                license: false,
            })
        }

        cancel(): void {
            this.visible = false
        }
    }
</script>
