/* ============================================
   IP Software Technologies - Particle System
   ============================================ */

class ParticleSystem {
    constructor(canvas) {
        this.canvas = canvas;
        this.ctx = canvas.getContext('2d');
        this.particles = [];
        this.mouse = { x: null, y: null, radius: 150 };
        this.animationId = null;
        this.init();
    }

    init() {
        this.resize();
        this.createParticles();
        this.bindEvents();
        this.animate();
    }

    resize() {
        this.canvas.width = window.innerWidth;
        this.canvas.height = window.innerHeight;
    }

    createParticles() {
        const count = Math.min(80, Math.floor((this.canvas.width * this.canvas.height) / 15000));
        this.particles = [];

        for (let i = 0; i < count; i++) {
            this.particles.push({
                x: Math.random() * this.canvas.width,
                y: Math.random() * this.canvas.height,
                size: Math.random() * 2 + 0.5,
                speedX: (Math.random() - 0.5) * 0.5,
                speedY: (Math.random() - 0.5) * 0.5,
                opacity: Math.random() * 0.5 + 0.1,
                color: Math.random() > 0.5 ? '29, 170, 216' : '237, 143, 40'
            });
        }
    }

    bindEvents() {
        window.addEventListener('resize', () => {
            this.resize();
            this.createParticles();
        });

        this.canvas.addEventListener('mousemove', (e) => {
            this.mouse.x = e.x;
            this.mouse.y = e.y;
        });

        this.canvas.addEventListener('mouseleave', () => {
            this.mouse.x = null;
            this.mouse.y = null;
        });
    }

    drawParticle(p) {
        this.ctx.beginPath();
        this.ctx.arc(p.x, p.y, p.size, 0, Math.PI * 2);
        this.ctx.fillStyle = `rgba(${p.color}, ${p.opacity})`;
        this.ctx.fill();
    }

    drawConnections() {
        for (let i = 0; i < this.particles.length; i++) {
            for (let j = i + 1; j < this.particles.length; j++) {
                const dx = this.particles[i].x - this.particles[j].x;
                const dy = this.particles[i].y - this.particles[j].y;
                const distance = Math.sqrt(dx * dx + dy * dy);

                if (distance < 120) {
                    const opacity = (1 - distance / 120) * 0.15;
                    this.ctx.beginPath();
                    this.ctx.moveTo(this.particles[i].x, this.particles[i].y);
                    this.ctx.lineTo(this.particles[j].x, this.particles[j].y);
                    this.ctx.strokeStyle = `rgba(29, 170, 216, ${opacity})`;
                    this.ctx.lineWidth = 0.5;
                    this.ctx.stroke();
                }
            }
        }
    }

    updateParticle(p) {
        // Mouse interaction
        if (this.mouse.x !== null && this.mouse.y !== null) {
            const dx = p.x - this.mouse.x;
            const dy = p.y - this.mouse.y;
            const distance = Math.sqrt(dx * dx + dy * dy);

            if (distance < this.mouse.radius) {
                const force = (this.mouse.radius - distance) / this.mouse.radius;
                p.x += (dx / distance) * force * 2;
                p.y += (dy / distance) * force * 2;
            }
        }

        // Move particle
        p.x += p.speedX;
        p.y += p.speedY;

        // Bounce off edges
        if (p.x < 0 || p.x > this.canvas.width) p.speedX *= -1;
        if (p.y < 0 || p.y > this.canvas.height) p.speedY *= -1;

        // Keep within bounds
        p.x = Math.max(0, Math.min(this.canvas.width, p.x));
        p.y = Math.max(0, Math.min(this.canvas.height, p.y));
    }

    animate() {
        this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);

        this.particles.forEach(p => {
            this.updateParticle(p);
            this.drawParticle(p);
        });

        this.drawConnections();
        this.animationId = requestAnimationFrame(() => this.animate());
    }

    destroy() {
        if (this.animationId) {
            cancelAnimationFrame(this.animationId);
        }
    }
}

// Initialize particles when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    const canvas = document.getElementById('particleCanvas');
    if (canvas) {
        new ParticleSystem(canvas);
    }
});
