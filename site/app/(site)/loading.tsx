// Squelette affiché pendant le chargement (Sanity, ISR re-validation, etc.)
// Reprend le rythme visuel du PageHero pour éviter le saut de mise en page.
export default function Loading() {
  return (
    <div className="page-fade-in">
      <section className="relative pt-12 pb-20 sm:pt-16 sm:pb-28 overflow-hidden">
        <div className="max-w-page mx-auto px-6 relative">
          <div className="grid grid-cols-12 gap-10 items-center">
            <div className="col-span-12 lg:col-span-7 space-y-6">
              <div className="skeleton h-3 w-44 rounded-full" />
              <div className="skeleton h-12 sm:h-20 w-11/12 rounded-2xl" />
              <div className="skeleton h-12 sm:h-20 w-9/12 rounded-2xl" />
              <div className="skeleton h-4 w-10/12 mt-6 rounded-full" />
              <div className="skeleton h-4 w-7/12 rounded-full" />
              <div className="flex gap-3 pt-2">
                <div className="skeleton h-12 w-40 rounded-full" />
                <div className="skeleton h-12 w-32 rounded-full" />
              </div>
            </div>
            <div className="col-span-12 lg:col-span-5">
              <div className="skeleton aspect-[4/5] rounded-[40px]" />
            </div>
          </div>
        </div>
      </section>

      <section className="py-20">
        <div className="max-w-page mx-auto px-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
          {Array.from({ length: 3 }).map((_, i) => (
            <div key={i} className="skeleton h-72 rounded-3xl" />
          ))}
        </div>
      </section>
    </div>
  )
}
