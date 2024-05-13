type Props = {
    src: string
    alt?: string
    sub?: string
}

export function Image({ src, alt, sub, ...props }: Props) {
    return (
        <div className="flex justify-center">
            <div className="bg-gray-200 dark:bg-zinc-800">
                <img
                    alt={alt}
                    {...props}
                    src={src}
                />
                {sub &&
                    <div className="flex justify-center">
                        <span className="text-center">
                            {sub}
                        </span>
                    </div>
                }
            </div>
        </div>
    );
}
