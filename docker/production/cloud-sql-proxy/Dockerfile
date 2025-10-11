# Download Cloud SQL Proxy
FROM gcr.io/cloud-sql-connectors/cloud-sql-proxy:2.18.2 AS proxy-binary

# Use a lightweight distro
FROM alpine:latest AS production

# Runtime dependencies
RUN apk add --no-cache wget ca-certificates

# Executable
COPY --from=proxy-binary /cloud-sql-proxy /cloud-sql-proxy

# non-root user and dir with proper permissions
RUN addgroup -g 65532 nonroot && \
    adduser -D -u 65532 -G nonroot nonroot && \
    mkdir -p /cloudsql && \
    chown nonroot:nonroot /cloudsql && \
    chmod 755 /cloudsql

# Switch to this user
USER nonroot

# The binary itself
ENTRYPOINT ["/cloud-sql-proxy"]

# Default command (will be overridden by docker-compose or can be customized)
CMD ["--structured-logs", "--unix-socket=/cloudsql"]
