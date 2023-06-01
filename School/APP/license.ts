import { Company } from '@/api/model/company'
import { AuthClient } from '@/api/auth-client'
import { User } from '@/api/model/user'

export class LicenseClient extends AuthClient {
    protected collectionName = 'license'

    async create(company: Company, user: User): Promise<void> {
        const response = await this.client.post(`${ this.basePath }/${ this.collectionName }`, {
            companyId: company.id,
            companyName: company.name,
            companyType: company.type,
            note: company.note,
            license: company.license,
            userId: user.id,
            firstname: user.firstname,
            middlename: user.middlename,
            lastname: user.lastname,
            gender: user.gender,
            email: user.email,
        })
    }

    async update(company: Company): Promise<void> {
        const response = await this.client.post(`${this.basePath}/${this.collectionName}/update`, {
            id: company.id,
            name: company.name,
            license: company.license,
            note: company.note,
        })
    }

    protected handleError(error: any) {
        throw error
    }
}
