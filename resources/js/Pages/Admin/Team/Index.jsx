import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.jsx';
import {Head, Link} from '@inertiajs/react';

export default function Index({teams}) {
    return (
        <AuthenticatedLayout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800">
                    Teams
                </h2>
            }
        >
            <Head title="Teams"/>

            <div className="py-12">
                <div className="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
                    <div className="bg-white p-4 shadow sm:rounded-lg sm:p-8">
                        {teams.map((team) => (
                            <div key={team.id} className={'flex gap-4 p-2'}>
                                <span>{team.name}</span>
                                <Link href={route('admin.teams.edit', team.id)}>
                                    Edit
                                </Link>
                            </div>
                        ))}
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
