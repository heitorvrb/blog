import { ReactNode } from 'react'

type Props = { className?: string, children: ReactNode }

export function Paragraph({ className = '', children, ...props }: Props) {
    return (
        <p
            {...props}
            className={
                'mt-4 text-xl/relaxed' +
                ' ' +
                className
            }
        >
            {children}
        </p>
    );
}
