<template>
    <block-container :cols="[2, 1]" :gap="2" :padding="[2]" background="none" style="max-width: 1620px; margin:0 auto;">
        <card :span="2" class="license-descriptions">
            <h1>{{ $t('license.management') }}</h1>
            <p>{{ $t('license.list.description') }}</p>
        </card>

        <card class="license-list">
            <div class="license-company-list min-w-full">
                <div class="flex flex-row">
                    <h1 class="license-title">{{ $t('license.list.companies') }}</h1>
                    <button v-if="!loading" class="create-company-button pb-5" @click='createCompanyLicense'>
                        <icon-plus :size="16"/>
                        <span>
                        {{ $t('license.list.addCompany') }}
                        </span>
                    </button>
                </div>
                <p class="pb-2">{{ $t('license.list.companiesDescription') }}</p>

                <div v-if="loading" class="flex items-center justify-center">
                    <loader-balls class="text-green-500"/>
                </div>

                <div v-else class="mb-4">
                    <input-text v-model="companyFilter" :placeholder="$t('license.list.search').toString()">
                        <template #content-right>
                            <div class="flex items-center justify-center">
                                <icon-magnifying-glass/>
                            </div>
                        </template>
                    </input-text>
                </div>

                <list-container
                    :find-item-callback="(items, itemId) => items.find(item => item.id === itemId)"
                    :find-item-id-callback="(item) => item.id"
                    :items="filteredCompanies"
                >
                    <template
                        v-for="company in filteredCompanies"
                        v-slot:[company.id]="{ item, containerId, positionKey }"
                    >
                        <list-item
                            :id="'company-' + item.id"
                            :key="positionKey"
                            :collapsed="item.id === activeCompanyId"
                            :item="item"
                            :item-key="item.id"
                            class="flex-grow"
                        >
                            <template #row>
                                <list-item-label>
                                    <p class="flex items-center h-full">
                                        {{ item.name }}
                                    </p>
                                </list-item-label>

                                <list-item-label :grow="false" class="w-1/5">
                                    <span class="font-regular text-xs text-vueSilver-600">
                                        {{ $t('license.list.companyLicense') }}
                                    </span>
                                    <p v-if="company.license === true">
                                        {{ $t('license.list.companyActive') }}
                                    </p>
                                    <p v-else>
                                        {{ $t('license.list.companyInactive') }}
                                    </p>
                                </list-item-label>

                                <list-item-label :grow="false" class="w-1/5">
                                    <span class="font-regular text-xs text-vueSilver-600">
                                        {{ $t('license.list.createdAt') }}
                                    </span>
                                    <p>
                                        {{ formatDate(item.createdAt) }}
                                    </p>
                                </list-item-label>

                                <list-item-label :grow="false" class="w-1/5">
                                    <span class="font-regular text-xs text-vueSilver-600">
                                        {{ $t('license.list.lastUpdatedAt') }}
                                    </span>
                                    <p>
                                        {{ formatDate(item.updatedAt) }}
                                    </p>
                                </list-item-label>

                                <list-item-action
                                    :icon="'IconVisibility'"
                                    :item="item"
                                    :label="$t('license.list.companyPreview').toString()"
                                    @list-item-action-click="companyItemClicked($event)"
                                />
                            </template>

                            <template #collapse>
                                <edit-company-license-form
                                    :company="activeCompany"
                                    @close="companyItemClose"
                                    @save="reload"
                                />
                            </template>
                        </list-item>
                    </template>
                </list-container>

                <create-company-license-modal
                    v-model="newCompanyLicense"
                    :formTitle="$t('license.title')"
                    @create="reload"
                />
            </div>
        </card>

        <card :span="1" class="license-company-users-list">
            <div>
                <h1>{{ $t('license.list.users') }}</h1>
                <p class="pb-5  ">{{ $t('license.list.usersDescription') }}</p>
                <template v-if="activeCompany">
                    <div class="mb-4">
                        <input-text v-model="userFilter" :placeholder="$t('license.list.search').toString()">
                            <template #content-right>
                                <div class="flex items-center justify-center">
                                    <icon-magnifying-glass/>
                                </div>
                            </template>
                        </input-text>
                    </div>
                    <list-container
                        :find-item-callback="(items, itemId) => items.find(item => item.id === itemId)"
                        :find-item-id-callback="(item) => item.id"
                        :items="sortedCompanyUsers"
                    >
                        <template
                            v-for="user in sortedCompanyUsers"
                            v-slot:[user.id]="{ item, containerId, positionKey }"
                        >
                            <list-item
                                :id="'user-' + item.id"
                                :key="positionKey"
                                :clickable="true"
                                :item="item"
                                :item-key="item.id"
                                class="flex-grow"
                            >
                                <template #row>

                                    <list-item-label class="flex items-center h-full">
                                        {{ item.name }}
                                    </list-item-label>

                                    <list-item-label :grow="false">
                                        {{ $t(`role.${item.role}`) }}
                                    </list-item-label>

                                    <list-item-action
                                        :icon="'IconPreview'"
                                        :item="item"
                                        :label="$t('license.list.userLogin').toString()"
                                        @list-item-action-click="impersonate(item)"
                                    />
                                </template>
                            </list-item>
                        </template>
                    </list-container>
                </template>

                <template v-else-if="!activeCompany">
                    <div class="user-instructions">
                        <div class="user-instructions__content">
                            <div
                                class="rounded w-16 h-16 p-4 bg-green-100 text-green-500 flex-shrink-0 flex justify-center items-center">
                                <icon-filter/>
                            </div>
                            <p class="text-sm w-1/2">
                                {{ $t('license.list.transitionInfo') }}
                            </p>
                        </div>
                    </div>
                </template>
            </div>
        </card>
    </block-container>
</template>

<script lang="ts">
    import { Component, Prop, Vue } from 'vue-property-decorator'
    import { Company } from '@/api/model/company'
    import { User } from '@/api/model/user'
    import { CompanyAPI, LicenseAPI, UserAPI } from '@/api/backend-client'
    import ListContainer from '@/components/ui/list/ListContainer.vue'
    import ListItem, { ListItemClickEvent } from '@/components/ui/list/list-item/ListItem.vue'
    import ListItemClickIndicator from '@/components/ui/list/list-item/ListItemClickIndicator.vue'
    import ListItemLabel from '@/components/ui/list/list-item/ListItemLabel.vue'
    import EditStatusReasonForm from '@/components/form/EditStatusReasonForm.vue'
    import EditCompanyForm from '@/components/form/EditCompanyForm.vue'
    import EditCompanyLicenseForm from '@/components/form/EditCompanyLicenseForm.vue'
    import moment from 'moment/moment'
    import BlockContainer from '@/components/ui/blocks/BlockContainer.vue'
    import IconArrow from '@/components/icons/IconArrow.vue'
    import IconArrowDoubleRight from '@/components/icons/IconArrowDoubleRight.vue'
    import IconSpouse from '@/components/icons/IconSpouse.vue'
    import ListItemAction from '@/components/ui/list/list-item/ListItemAction.vue'
    import IconMagnifyingGlass from '@/components/icons/IconMagnifyingGlass.vue'

    @Component({
        components: {
            IconMagnifyingGlass,
            ListItemAction,
            IconSpouse,
            IconArrowDoubleRight,
            IconArrow,
            BlockContainer,
            EditCompanyLicenseForm,
            EditCompanyForm,
            EditStatusReasonForm,
            ListItemLabel,
            ListItemClickIndicator,
            ListItem,
            ListContainer,
        },
    })
    export default class CompanySettingsLicense extends Vue {
        @Prop() user!: User
        companies: Company[] = []
        activeCompany: Company = null
        loading: boolean = false
        newCompanyLicense = false
        companyFilter = ''
        userFilter = ''

        get sortedCompanyUsers() {
            let users

            if (!this.userFilter) {
                users = this.activeCompany.users.slice()
            } else {
                users = this.activeCompany.users.filter(user => {
                    return user.name.toLowerCase().includes(this.userFilter.toLowerCase())
                })
            }

            return users.sort((a, b) => a.name.localeCompare(b.name))
        }

        get filteredCompanies() {
            if (!this.companyFilter) {
                return this.companies
            }

            return this.companies.filter(company => company.name.toLowerCase().includes(this.companyFilter.toLowerCase()))
        }

        get activeCompanyId(): null | string {
            return this.activeCompany?.id
        }

        async mounted(): Promise<void> {
            await this.reload()
        }

        async reload(): Promise<void> {
            this.loading = true
            this.companies = (await CompanyAPI.getAll()).sort((a, b) => {
                return a.name.localeCompare(b.name)
            })
            this.loading = false
        }

        formatDate(date: Date) {
            return moment(date).format('DD MMMM YYYY')
        }

        companyItemClicked(event: ListItemClickEvent<Company>) {
            if (event.item.id !== this.activeCompany?.id) {
                this.activeCompany = event.item
            } else {
                this.activeCompany = null
            }
        }

        companyItemClose() {
            this.activeCompany = null
        }

        createCompanyLicense() {
            this.newCompanyLicense = true
        }

        async impersonate(user: User) {
            await UserAPI.loginImpersonate(user.id)
            window.location.replace('/dashboard')
        }
    }
</script>

<style lang="scss" scoped>
.license {
    display: flex;
    gap: 40px;
    border: 1px solid #dedede;

}

.license-list {
    display: flex;
    justify-content: space-between;
    gap: 40px;

}

.license-title {
    min-width: 80%;
}

.license-descriptions {
    display: flex;
    flex-direction: column;

    > p {
        @apply w-2/3;
        @apply text-sm;
        @apply text-gray-700;

    }
}

.create-company-button {
    @apply flex;
    @apply mt-2;
    @apply gap-2;
    @apply w-full;
    @apply text-green-500;
    @apply bg-none;
    @apply border-none;
    @apply justify-center;
    @apply items-center;
    @apply font-semibold;
    @apply text-sm;

    & > .kv-icon-plus {
        transform: scale(1);
        transition: transform .5s;
    }

    &:hover {
        & .kv-icon-plus {
            transform: scale(1.2) rotate(90deg);
        }
    }
}

.user-instructions {
    @apply rounded-md;
    border: 1px solid #dedede;
    display: flex;
    padding: 40px;

    &__content {
        display: flex;
        gap: 20px;
    }
}
</style>
