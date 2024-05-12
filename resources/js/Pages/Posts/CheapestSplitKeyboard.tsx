import { Link as InertiaLink, Head } from '@inertiajs/react';
import { PageProps } from '@/types';
import { Link } from '@/Components/Link';
import { Paragraph } from '@/Components/Paragraph';
import { Image } from '@/Components/Image';

export default function CheapestSplitKeyboard({ post }: PageProps<{ post: any }>) {
    return (
        <>
            <Head title={post.title} />
            <div className="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
                <img id="background" className="absolute -left-20 top-0 max-w-[877px]" src="/background.svg" />
                <div className="relative min-h-screen flex flex-col items-center justify-center">
                    <div className="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                        <header className="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-1">
                            <nav className="-mx-3 flex flex-1 justify-end">
                                <InertiaLink
                                    href={route('home')}
                                    className="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                >
                                    Home
                                </InertiaLink>
                            </nav>
                            <div className="flex justify-center col-start-1">
                                <p className="text-6xl">{post.title}</p>
                            </div>
                        </header>

                        <main className="mt-6">
                            <div className="grid gap-6 lg:gap-8">

                                <div key={post.id}
                                    className="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] text-black/70 lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:text-white/70 "
                                >
                                    <div className="px-9 pt-3 sm:pt-5">
                                        <Paragraph>
                                            <Image
                                                src='/split.jpg'
                                            />
                                        </Paragraph>
                                        <Paragraph>
                                            I was always kind of aware of ergonomic computer perypherals, but it was only after watching <Link href='https://www.youtube.com/watch?v=78aw1muYWQM'>Akita's epic quest to the world's best keyboard</Link> that I was sold on the idea of improving my setup. Then I started following ThePrimeagen on youtube and inevitably came across his <Link href='https://youtube.com/watch?v=nh-BAxbithc'>multiple</Link> <Link href='https://youtube.com/watch?v=VzsxDbkV4rE'>displays</Link> of <Link href='/prime.png'>love</Link> for his Kinesis Advantage 360 keyboard. Decided on getting the most lickable keyboard, I checked the price.
                                        </Paragraph>
                                        <Paragraph>
                                            450 dollars.
                                        </Paragraph>
                                        <Paragraph>
                                            Ugh.
                                        </Paragraph>
                                        <Paragraph>
                                            For those unaware, 1 Real is roughly 5 US dollars. And if that didn't make this keyboard expensive enough for me, there's still a 92% import tax on everything that comes via any shipping method.
                                        </Paragraph>
                                        <Paragraph>
                                            So effectively you can count that importing any kind of perypherals to Brazil is going to cost me double.
                                        </Paragraph>
                                        <Paragraph>
                                            For comparative sake, a 900 dollar (~4500 Reais) price tag means more than three months of Brazilian minimum wage.
                                        </Paragraph>
                                        <Paragraph>
                                            Defeated, I looked at some alternatives, like the Moonlander or the Ergodox, but they were all too expensive for me. I also saw some chinese knockoffs and more traditional ergonomic keyboards, like the Microsoft Surface Ergonomic. But I really wanted a split keyboard, to separate the hands and get a more comfortable stance.
                                        </Paragraph>
                                        <Paragraph>
                                            Then, I found the Diti.
                                        </Paragraph>
                                        <Paragraph>
                                            <Image
                                                src='/ditix.png'
                                            />
                                        </Paragraph>
                                        <Paragraph>
                                            The Redragon Diti (and the Diti X, which are effectively the same keyboards in two different model names for some strange reason) is a half-sized gaming keyboard. It is meant for those kind of games in which your right hand is on your mouse the whole time, like FPSes, MMOs and Strategy RPGs. Having only the left-hand half of a keyboard would be very detrimental for programming, though, but that doesn't mean I had to use it by itself!
                                        </Paragraph>
                                        <Paragraph>
                                            So, with a reasonable price tag of 200 Reais (~39 dollars), I could have a makeshift split keyboard using the Diti as my left hand and my trusty membrane-switched full-sized Logitech as my right hand. Worth a try, right?
                                        </Paragraph>
                                        <Paragraph>
                                            <Image
                                                src='/setup1.jpg'
                                            />
                                        </Paragraph>
                                        <Paragraph>
                                            I bought and used the Diti as my left hand for a few months, and it was already better on my wrists, but the setup still had a few downsides, mainly for using it together with a traditional keyboard:
                                        </Paragraph>
                                        <Paragraph>
                                            <ul className="ml-12 list-disc">
                                                <li>
                                                    I couldn't adjust the hands to be the perfect distance, since I had the burden of the unused left side of the Logitech in the middle of the table;
                                                </li>
                                                <li>
                                                    The mouse was too far away, even worse than what is normally a big downside when using a full-size keyboard with a numpad;
                                                </li>
                                                <li>
                                                    No thumb cluster on the right hand (the Diti has some nice thumb reachable keys on the left hand, though, so at least that's nice);
                                                </li>
                                                <li>
                                                    The alternating sounds of a mechanical keypress and a membrane keypress were pretty annoying.
                                                </li>
                                            </ul>
                                        </Paragraph>
                                        <Paragraph>
                                            I looked everywhere for a "right-hand only" keyboard, but it simply doesn't exist. I was already bending my luck by using the Diti as a typing instrument instead of a gaming instrument, and appearently Redragon never thought of making me a right-hand companion.
                                        </Paragraph>
                                        <Paragraph>
                                            Then, one day, it dawned on me.
                                        </Paragraph>
                                        <Paragraph>
                                            What if I used TWO DITIS??
                                        </Paragraph>
                                        <Paragraph>
                                            <Image
                                                src='/setup1.jpg'
                                            />
                                        </Paragraph>
                                        <Paragraph>
                                            I immediately switched my Diti to the right of the Logitech, and fired my favorite program: <Link href='https://github.com/sezanzeb/input-remapper'>Input Remapper</Link>. More than a simple GUI wrapper for xmodmap, Input Remapper allows all kinds on interesting mouse and keyboard remapping. I usually only use it for simple stuff, like using the Caps Lock key as Esc, but this time I was going to overclock it - I was going to remap my whole Diti to test if it could be a right-hand keyboard!
                                        </Paragraph>
                                        <Paragraph>
                                            I started experimenting with a few possible right-hand layouts for the Diti, and ended up on what I thought was the best: move everything one row up so the F keys become the numbers, the number row is the letter's top row and so on. That makes my thumb rest perfectly on the shift key, so that becomes space, as long as I yank out of the way the almost useless Fn key (its only function is changing the keyboard's RGB pattern). Then I mapped Enter to the Ctrl key - thumb cluster!!!1! Now I was using the Diti as my right-hand keyboard, and the Logitech as my left-hand keyboard. I'm still playing around with the positioning of some other less-used keys on the right hand, but after testing this configuration for a few days, it was proven: the Dual Diti plan works!
                                        </Paragraph>
                                        <Paragraph>
                                            I purchased another Diti, together with a cheap keycap set (also from Redragon!), and after a few days of shipping, it was build time. All the remapping was already done in Input Remapper, so all I had to do was change the keycaps and import the config file between units. And voilà! I finally ditched the Logitech keyboard!
                                        </Paragraph>
                                        <Paragraph>
                                            <Image
                                                src='/setup1.jpg'
                                            />
                                        </Paragraph>
                                        <Paragraph>
                                            So this is the story of the World's Cheapest Split Keyboard! This was quite a journey for me, but now, after using this setup for a few days, it is definitely nice and totally worth it, for the bargain of ~450 Reais (~87 dollars)! I still lack all the other features of the Advantage 360, like the concave shape, ortholinearity, more keys on thumb clusters, easier configuration, layers and so on. But the main features (split boards and thumb keys) are there, and that might be enough for me - for now at least!
                                        </Paragraph>
                                        <Paragraph>
                                            In conclusion, if you live in a country where stuff is reasonably priced and not prohibitively taxed, you should probably just get a proper ortholinear split keyboard. But if you're not, maybe you can think outside the box and find a good enough alternative.
                                        </Paragraph>
                                        <Paragraph>
                                            Thank you for reading!
                                        </Paragraph>
                                    </div>
                                </div>

                            </div>
                        </main>

                        <footer className="py-16 text-center text-sm text-black dark:text-white/70">
                        </footer>
                    </div>
                </div >
            </div >
        </>
    );
}
