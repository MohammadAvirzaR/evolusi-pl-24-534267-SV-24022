<script setup>
import { Head, Link } from '@inertiajs/vue3';
import ProjectCard from '@/Components/ProjectCard.vue';

defineProps({
    canLogin: { type: Boolean },
    canRegister: { type: Boolean },
    laravelVersion: { type: String, required: true },
    phpVersion: { type: String, required: true },
});
</script>

<template>
    <Head title="Mohammad Avirza R — Game Developer" />
    <div class="portfolio">
        <nav v-if="canLogin" class="nav">
            <div class="nav-inner">
                <span class="nav-logo">MAR<span class="accent">.</span></span>
                <div class="nav-links">
                    <Link v-if="$page.props.auth.user" :href="route('dashboard')" class="nav-link">
                        Dashboard
                    </Link>
                    <template v-else>
                        <Link :href="route('login')" class="nav-link">Log in</Link>
                        <Link v-if="canRegister" :href="route('register')" class="nav-link nav-link-cta">
                            Register
                        </Link>
                    </template>
                </div>
            </div>
        </nav>

        <header class="hero">
            <div class="hero-glow"></div>
            <div class="hero-content">
                <p class="hero-eyebrow">Game Developer &middot; Full-Stack Developer</p>
                <h1 class="hero-title">
                    Mohammad Avirza R
                </h1>
                <p class="hero-subtitle">
                    Membangun dunia interaktif dengan <span class="accent">Unreal Engine 5</span>,
                    dan sistem web dengan <span class="accent">Laravel & Vue</span>.
                    Mahasiswa D-IV Teknologi Rekayasa Perangkat Lunak, UGM.
                </p>
                <div class="hero-cta">
                    <a href="#projects" class="btn btn-primary">Lihat Project</a>
                    <a href="#contact" class="btn btn-ghost">Hubungi Saya</a>
                </div>
            </div>
        </header>

        <main class="content">
            <section id="projects" class="section">
                <h2 class="section-title">Featured Project</h2>
                <div class="project-grid">
                    <ProjectCard
                        title="Bracelet of Words"
                        tagline="Words Are Weapons"
                        description="Third-person action-adventure single-player di Unreal Engine 5. Pemain mengetik kata secara real-time saat combat untuk mengubahnya jadi kekuatan elemental lewat Bracelet of Elements. Target presentasi: semi-AAA vertical slice."
                        status="In Development"
                        :tags="['Unreal Engine 5', 'C++/Blueprint', 'Action-Adventure', 'PC']"
                    />
                    <ProjectCard
                        title="Portofolio Website"
                        tagline="Laravel × Vue × Inertia"
                        description="Website portofolio ini sendiri — dibangun dengan Laravel sebagai backend dan Vue via Inertia.js sebagai frontend, lengkap dengan CI/CD pipeline di GitHub Actions."
                        status="Live"
                        :tags="['Laravel', 'Vue 3', 'Inertia.js', 'GitHub Actions']"
                    />
                </div>
            </section>

            <section class="section">
                <h2 class="section-title">Tools & Skills</h2>
                <div class="skills-grid">
                    <div class="skill-chip">Unreal Engine 5</div>
                    <div class="skill-chip">Laravel</div>
                    <div class="skill-chip">Vue.js</div>
                    <div class="skill-chip">C++</div>
                    <div class="skill-chip">PHP</div>
                    <div class="skill-chip">Git & CI/CD</div>
                    <div class="skill-chip">Blender</div>
                    <div class="skill-chip">Game Design</div>
                </div>
            </section>
        </main>

        <footer id="contact" class="footer">
            <p>Mohammad Avirza R &middot; Game Developer & Software Engineer</p>
            <p class="footer-meta">Laravel v{{ laravelVersion }} &middot; PHP v{{ phpVersion }}</p>
        </footer>
    </div>
</template>

<style scoped>
.portfolio {
    min-height: 100vh;
    background: #0a0a14;
    color: #e4e4f0;
    font-family: 'Figtree', system-ui, sans-serif;
}
.accent { color: #ff6b35; }

.nav {
    position: sticky;
    top: 0;
    z-index: 10;
    background: rgba(10, 10, 20, 0.85);
    backdrop-filter: blur(8px);
    border-bottom: 1px solid #1e1e3a;
}
.nav-inner {
    max-width: 1100px;
    margin: 0 auto;
    padding: 1rem 1.5rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.nav-logo {
    font-weight: 800;
    font-size: 1.25rem;
    letter-spacing: 0.05em;
}
.nav-links { display: flex; gap: 1rem; align-items: center; }
.nav-link {
    color: #b8b8d1;
    text-decoration: none;
    font-weight: 600;
    font-size: 0.9rem;
    padding: 0.4rem 0.9rem;
    border-radius: 6px;
    transition: color 0.2s;
}
.nav-link:hover { color: #fff; }
.nav-link-cta {
    background: #8a2be2;
    color: #fff !important;
}

.hero {
    position: relative;
    padding: 6rem 1.5rem 5rem;
    text-align: center;
    overflow: hidden;
}
.hero-glow {
    position: absolute;
    top: -200px;
    left: 50%;
    transform: translateX(-50%);
    width: 700px;
    height: 500px;
    background: radial-gradient(circle, rgba(138,43,226,0.35) 0%, rgba(255,107,53,0.12) 40%, transparent 70%);
    filter: blur(60px);
    pointer-events: none;
}
.hero-content { position: relative; max-width: 800px; margin: 0 auto; }
.hero-eyebrow {
    color: #8a2be2;
    font-weight: 700;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    font-size: 0.85rem;
    margin-bottom: 1rem;
}
.hero-title {
    font-size: clamp(2.5rem, 6vw, 4rem);
    font-weight: 900;
    line-height: 1.1;
    margin: 0 0 1.25rem;
    background: linear-gradient(135deg, #fff 30%, #b8b8d1 100%);
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
}
.hero-subtitle {
    font-size: 1.15rem;
    line-height: 1.7;
    color: #b8b8d1;
    margin-bottom: 2.5rem;
}
.hero-cta { display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap; }
.btn {
    padding: 0.8rem 1.75rem;
    border-radius: 8px;
    font-weight: 700;
    text-decoration: none;
    transition: transform 0.2s, box-shadow 0.2s;
}
.btn-primary {
    background: linear-gradient(135deg, #ff6b35, #8a2be2);
    color: #fff;
}
.btn-primary:hover { transform: translateY(-2px); box-shadow: 0 8px 24px rgba(138,43,226,0.4); }
.btn-ghost {
    background: transparent;
    color: #e4e4f0;
    border: 1px solid #2d2d5f;
}
.btn-ghost:hover { border-color: #8a2be2; color: #fff; }

.content { max-width: 1100px; margin: 0 auto; padding: 2rem 1.5rem 5rem; }
.section { margin-bottom: 4rem; }
.section-title {
    font-size: 1.75rem;
    font-weight: 800;
    margin-bottom: 2rem;
    color: #fff;
}
.project-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: 1.5rem;
}

.skills-grid { display: flex; flex-wrap: wrap; gap: 0.75rem; }
.skill-chip {
    background: #16213e;
    border: 1px solid #2d2d5f;
    color: #e4e4f0;
    padding: 0.6rem 1.2rem;
    border-radius: 8px;
    font-weight: 600;
    font-size: 0.9rem;
    transition: border-color 0.2s, transform 0.2s;
}
.skill-chip:hover { border-color: #ff6b35; transform: translateY(-2px); }

.footer {
    border-top: 1px solid #1e1e3a;
    padding: 2rem 1.5rem;
    text-align: center;
    color: #b8b8d1;
    font-size: 0.9rem;
}
.footer-meta { margin-top: 0.5rem; color: #6a6a8a; font-size: 0.8rem; }
</style>
