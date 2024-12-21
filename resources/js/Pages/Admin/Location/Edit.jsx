import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import {Head, useForm, usePage} from '@inertiajs/react';
import InputLabel from '@/Components/InputLabel';
import TextInput from "@/Components/TextInput.jsx";
import InputError from "@/Components/InputError.jsx";
import {Transition} from "@headlessui/react";
import PrimaryButton from "@/Components/PrimaryButton.jsx";

export default function Edit({mustVerifyEmail, status}) {

    const location = usePage().props.location;

    const {data, setData, put, errors, processing, recentlySuccessful} =
        useForm({
            name: location.name,
            slug: location.slug,
            location: location.location,
        });

    const submit = (e) => {
        e.preventDefault();

        put(route('admin.locations.update', location.id));
    };

    return (
        <AuthenticatedLayout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800">
                    Location {data.name}
                </h2>
            }
        >
            <Head title={"Location " + data.name}/>

            <div className="py-12">
                <div className="mx-auto max-w-xl space-y-6 sm:px-6 lg:px-8">
                    <div className="bg-white p-4 shadow sm:rounded-lg sm:p-8">
                        <section className={''}>
                            <form onSubmit={submit} className="space-y-6">
                                <div>
                                    <InputLabel htmlFor="name" value="Name"/>
                                    <TextInput
                                        id="name"
                                        className="mt-1 block w-full"
                                        value={data.name}
                                        onChange={(e) => setData('name', e.target.value)}
                                        required
                                        isFocused
                                        autoComplete="name"
                                    />
                                    <InputError className="mt-2" message={errors.name}/>
                                </div>
                                <div>
                                    <InputLabel htmlFor="slug" value="Slug"/>
                                    <TextInput
                                        id="slug"
                                        className="mt-1 block w-full"
                                        value={data.slug}
                                        onChange={(e) => setData('slug', e.target.value)}
                                        required
                                    />
                                    <InputError className="mt-2" message={errors.slug}/>
                                </div>
                                <div>
                                    <InputLabel htmlFor="location" value="Location"/>
                                    <TextInput
                                        id="location"
                                        className="mt-1 block w-full"
                                        value={data.location}
                                        onChange={(e) => setData('location', e.target.value)}
                                        required
                                    />
                                    <InputError className="mt-2" message={errors.location}/>
                                </div>

                                <div className="flex items-center gap-4">
                                    <PrimaryButton disabled={processing}>Save</PrimaryButton>

                                    <Transition
                                        show={recentlySuccessful}
                                        enter="transition ease-in-out"
                                        enterFrom="opacity-0"
                                        leave="transition ease-in-out"
                                        leaveTo="opacity-0"
                                    >
                                        <p className="text-sm text-gray-600">
                                            Saved.
                                        </p>
                                    </Transition>
                                </div>
                            </form>
                        </section>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
