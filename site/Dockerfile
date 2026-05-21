# =============================================================================
# Elite Atacora — Next.js (Coolify / Docker)
# Build context : dossier `site/` (Base Directory dans Coolify)
# =============================================================================

FROM node:22-alpine AS base
RUN apk add --no-cache libc6-compat
WORKDIR /app

# --- Dépendances (cache Docker layer) ----------------------------------------
FROM base AS deps
COPY package.json package-lock.json ./
RUN npm ci

# --- Build -------------------------------------------------------------------
FROM base AS builder
COPY --from=deps /app/node_modules ./node_modules
COPY . .

# Variables NEXT_PUBLIC_* : obligatoires au build (inlinées côté client).
# Dans Coolify : cocher "Available at Buildtime" pour ces variables.
ARG NEXT_PUBLIC_SANITY_PROJECT_ID
ARG NEXT_PUBLIC_SANITY_DATASET=production
ENV NEXT_PUBLIC_SANITY_PROJECT_ID=$NEXT_PUBLIC_SANITY_PROJECT_ID
ENV NEXT_PUBLIC_SANITY_DATASET=$NEXT_PUBLIC_SANITY_DATASET

ENV NEXT_TELEMETRY_DISABLED=1
RUN npm run build

# --- Image de production (légère) --------------------------------------------
FROM base AS runner
ENV NODE_ENV=production
ENV NEXT_TELEMETRY_DISABLED=1

RUN addgroup --system --gid 1001 nodejs \
  && adduser --system --uid 1001 nextjs

COPY --from=builder /app/public ./public
COPY --from=builder --chown=nextjs:nodejs /app/.next/standalone ./
COPY --from=builder --chown=nextjs:nodejs /app/.next/static ./.next/static

USER nextjs

EXPOSE 3000
ENV PORT=3000
ENV HOSTNAME=0.0.0.0

CMD ["node", "server.js"]
