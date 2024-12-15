import {Link} from "@inertiajs/react";

export default function BaseLayout({
                                       appName,
                                       auth,
                                       menuPrimary,
                                       menuSecondary,
                                       children
                                   }) {
    return (
        <>
            <div className="flex border-b">
                <ul className="flex-1">
                    {menuSecondary.map((subItem) => (
                        <Link className={"p-2 inline-block"} key={subItem.name} href={subItem.url}>{subItem.name}</Link>
                    ))}
                </ul>
                <div className={"flex"}>
                    {auth.user ? (
                        <Link
                            className={"p-2"}
                            href={route('dashboard')}
                        >
                            My Account
                        </Link>
                    ) : (
                        <>
                            <Link
                                className={"p-2"}
                                href={route('login')}
                            >
                                Log in
                            </Link>
                            <Link
                                className={"p-2"}
                                href={route('register')}
                            >
                                Register
                            </Link>
                        </>
                    )}
                </div>
            </div>

            <header className={'flex'}>
                <div className={'flex-1'}>
                    <img src="" alt=""/>
                    {appName}
                </div>
                <nav>
                    {menuPrimary.map((item) => (
                        <Link className={"p-2 inline-block"} key={item.name} href={item.url}>{item.name}</Link>
                    ))}
                </nav>
            </header>

            <div>
                {children}
            </div>

            <footer>
                footer
                <div>
                    &copy; {appName}
                    Address
                </div>
                <nav>
                    links
                </nav>
                <nav>
                    links
                </nav>
                <div>
                    socials
                    tt england link
                </div>
            </footer>
        </>
    );
}
