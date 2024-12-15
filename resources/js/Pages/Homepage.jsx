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
            <div className={'flex'}>
                <div>
                    {advertisementsPrimary.map((advertisement) => (
                        <div key={advertisement.id} className={"flex-1 bg-orange-500"}>
                            <img src={advertisement.image}
                                 alt={advertisement.title}
                                 title={advertisement.title}
                                 className={'w-full'}
                            />
                            <Link href={advertisement.url}>{advertisement.action}</Link>
                        </div>
                    ))}
                </div>
                <div className={'max-w-lg'}>
                    <h2>Press Releases</h2>
                    {latestPress.map((press) => (
                        <div key={press.id}>
                            <h3>{press.title}</h3>
                            <p>{press.body}</p>
                        </div>
                    ))}
                </div>
            </div>
            <div>
                latest fulfilled fixtures
                <div>fixture</div>
                <div>fixture</div>
                <div>fixture</div>
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
