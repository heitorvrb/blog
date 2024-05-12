type Props = { className?: string, src: string }

export function Image({ className = '', src, ...props }: Props) {
    return (
        <div className="flex justify-center">
            <img
                {...props}
                src={src}
            />
        </div>
    );
}
