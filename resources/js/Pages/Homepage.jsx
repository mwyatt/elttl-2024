import BaseLayout from "@/Layouts/BaseLayout.jsx";
import {Link} from "@inertiajs/react";

export default function Homepage({
                                     appName,
                                     auth,
                                     menuPrimary,
                                     menuSecondary,
                                     latestPress,
                                     advertisementsPrimary
                                 }) {
    return (
        <BaseLayout
            appName={appName}
            auth={auth}
            menuPrimary={menuPrimary}
            menuSecondary={menuSecondary}
        >
            <div className={''}>
                <div className={''}>
                    {advertisementsPrimary.map((advertisement) => (
                        <div key={advertisement.id} className={"p-6 flex-1 bg-orange-500 text-center"}>
                            <h2 className={'my-4 text-6xl'}>{advertisement.title}</h2>
                            <p className={'my-3 text-3xl'}>{advertisement.description}</p>
                            <Link className={'bg-amber-50 rounded px-3 py-2'}
                                  href={advertisement.url}>{advertisement.action}</Link>
                        </div>
                    ))}
                </div>
                <div className={''}>
                    <h2 className={'text-2xl p-4'}>Press Releases</h2>
                    {latestPress.map((press) => (
                        <div className={'p-4 border-b'} key={press.id}>
                            <h3>{press.title}</h3>
                            <p>{press.body}</p>
                            <p>{press.createdAt}</p>
                        </div>
                    ))}
                </div>
            </div>
            <div>
                <h2>Latest Fixtures</h2>
            </div>
            <div>
                Gallery
                <img src="" alt=""/>
                <img src="" alt=""/>
                <img src="" alt=""/>
            </div>
            <div>
                secondary banner ads
            </div>
        </BaseLayout>
    );
}
