import {Link} from "@inertiajs/react";
import ElttlEmblem from '@/Components/ElttlEmblem';
import Arrow from '@/Components/Arrow';
import {useState} from "react";

export default function BaseLayout({
                                       appName,
                                       auth,
                                       menuPrimary,
                                       menuSecondary,
                                       children
                                   }) {
    const [menuPrimaryOpenStatuses, setMenuPrimaryOpenStatuses] = useState(
        menuPrimary.map((item) => {
            return {
                name: item.name,
                isOpen: false
            };
        })
    );

    console.log(menuPrimaryOpenStatuses);

    function handleMenuPrimaryClick(index) {
        menuPrimaryOpenStatuses[index].isOpen = !menuPrimaryOpenStatuses[index].isOpen;
        setMenuPrimaryOpenStatuses([...menuPrimaryOpenStatuses]);
    }

    return (
        <>
            <div className="flex border-b text-sm">
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

            <header className={'sm:flex border-b'}>
                <Link className={'flex-1 flex gap-2 sm:gap-4 p-4 items-center justify-center border-b'}>
                    <ElttlEmblem className={'sm:hidden'} width={'50px'}/>
                    <ElttlEmblem className={'hidden sm:block'} width={'75px'}/>
                    <span className={''}>
                        <span className={'hidden sm:block text-4xl'}>{appName}</span>
                        <span className={'sm:hidden text-5xl font-bold'}>ELTTL</span>
                    </span>
                </Link>
                <nav className={'flex text-xl'}>
                    {menuPrimary.map((item, index) => (
                        <span key={index} onClick={() => handleMenuPrimaryClick(index)}
                              className={"p-4 inline-block border-l flex grow"}
                              key={item.name}
                              href={item.url}>
                            <span className={'grow'}>{item.name}</span>
                            <span className={'content-center'}><Arrow/></span>
                        </span>
                    ))}
                </nav>

                {menuPrimary.map((item, index) => (
                    <ul key={index} className={menuPrimaryOpenStatuses[index].isOpen ? 'block' : 'hidden'}>
                        {
                            item.children.map((subItem) => (
                                <li key={subItem.name}>
                                    <Link className={'px-4 py-2 block'} href={subItem.url}>{subItem.name}</Link>
                                </li>
                            ))}
                    </ul>
                ))}

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
