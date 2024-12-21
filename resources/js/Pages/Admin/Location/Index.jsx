import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.jsx';
import {Head, Link} from '@inertiajs/react';

export default function Index({locations}) {
    return (
        <AuthenticatedLayout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800">
                    Locations
                </h2>
            }
        >
            <Head title="Locations"/>

            <div className="py-12">
                <div className="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
                    <div className="bg-white p-4 shadow sm:rounded-lg sm:p-8">
                        {locations.map((location) => (
                            <div key={location.id} className={'flex gap-4 p-2'}>
                                <span>{location.name}</span>
                                <Link href={route('admin.locations.edit', location.id)}>
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
