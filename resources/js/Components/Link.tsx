import { ReactNode } from "react";

type Props = { className?: string, href: string, children: ReactNode }

export function Link({ className = '', href, children, ...props }: Props) {
    return (
        <a
            {...props}
            href={href}
            className={
                'underline text-black hover:text-black/70 dark:text-white dark:hover:text-white/80 '
                + className
            }
        >
            {children}
        </a>
    );
}
