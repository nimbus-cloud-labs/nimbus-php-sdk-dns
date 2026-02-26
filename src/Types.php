<?php

declare(strict_types=1);

namespace NimbusSdk\Dns;

final class CommandResponse implements \JsonSerializable
{
    public function __construct(
        public string $message
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): CommandResponse
    {
        if (!array_key_exists('message', $data)) {
            throw new \InvalidArgumentException('Missing required field message');
        }
        $message = (string) $data['message'];
        return new CommandResponse(
            $message
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        $data['message'] = $this->message;
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class CreateRecordRequest implements \JsonSerializable
{
    public function __construct(
        public string $tenantId,
        public string $name,
        public RecordTypePayload $recordType,
        public int $ttl,
        public array $data,
        public ?string $id = null,
        public ?int $version = null
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): CreateRecordRequest
    {
        $id = array_key_exists('id', $data)
            ? (string) $data['id']
            : null;
        if (!array_key_exists('tenantId', $data)) {
            throw new \InvalidArgumentException('Missing required field tenantId');
        }
        $tenantId = (string) $data['tenantId'];
        if (!array_key_exists('name', $data)) {
            throw new \InvalidArgumentException('Missing required field name');
        }
        $name = (string) $data['name'];
        if (!array_key_exists('recordType', $data)) {
            throw new \InvalidArgumentException('Missing required field recordType');
        }
        $recordType = RecordTypePayload::from((string) $data['recordType']);
        if (!array_key_exists('ttl', $data)) {
            throw new \InvalidArgumentException('Missing required field ttl');
        }
        $ttl = (int) $data['ttl'];
        if (!array_key_exists('data', $data)) {
            throw new \InvalidArgumentException('Missing required field data');
        }
        $data = is_array($data['data']) ? $data['data'] : [];
        $version = array_key_exists('version', $data)
            ? (int) $data['version']
            : null;
        return new CreateRecordRequest(
            $tenantId,
            $name,
            $recordType,
            $ttl,
            $data,
            $id,
            $version
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        if ($this->id !== null) {
            $data['id'] = $this->id;
        }
        $data['tenantId'] = $this->tenantId;
        $data['name'] = $this->name;
        $data['recordType'] = $this->recordType->value;
        $data['ttl'] = $this->ttl;
        $data['data'] = $this->data;
        if ($this->version !== null) {
            $data['version'] = $this->version;
        }
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class CreateZoneRequest implements \JsonSerializable
{
    public function __construct(
        public string $tenantId,
        public string $name,
        public ?string $id = null,
        public ?int $version = null
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): CreateZoneRequest
    {
        $id = array_key_exists('id', $data)
            ? (string) $data['id']
            : null;
        if (!array_key_exists('tenantId', $data)) {
            throw new \InvalidArgumentException('Missing required field tenantId');
        }
        $tenantId = (string) $data['tenantId'];
        if (!array_key_exists('name', $data)) {
            throw new \InvalidArgumentException('Missing required field name');
        }
        $name = (string) $data['name'];
        $version = array_key_exists('version', $data)
            ? (int) $data['version']
            : null;
        return new CreateZoneRequest(
            $tenantId,
            $name,
            $id,
            $version
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        if ($this->id !== null) {
            $data['id'] = $this->id;
        }
        $data['tenantId'] = $this->tenantId;
        $data['name'] = $this->name;
        if ($this->version !== null) {
            $data['version'] = $this->version;
        }
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class DeleteRecordQuery implements \JsonSerializable
{
    public function __construct(
        public string $tenantId
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): DeleteRecordQuery
    {
        if (!array_key_exists('tenantId', $data)) {
            throw new \InvalidArgumentException('Missing required field tenantId');
        }
        $tenantId = (string) $data['tenantId'];
        return new DeleteRecordQuery(
            $tenantId
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        $data['tenantId'] = $this->tenantId;
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class DeleteZoneQuery implements \JsonSerializable
{
    public function __construct(
        public string $tenantId
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): DeleteZoneQuery
    {
        if (!array_key_exists('tenantId', $data)) {
            throw new \InvalidArgumentException('Missing required field tenantId');
        }
        $tenantId = (string) $data['tenantId'];
        return new DeleteZoneQuery(
            $tenantId
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        $data['tenantId'] = $this->tenantId;
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class ListRecordsResponse implements \JsonSerializable
{
    public function __construct(
        public ListRecordsResponseRecordsList $records
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): ListRecordsResponse
    {
        if (!array_key_exists('records', $data)) {
            throw new \InvalidArgumentException('Missing required field records');
        }
        $records = ListRecordsResponseRecordsList::fromArray(is_array($data['records']) ? $data['records'] : []);
        return new ListRecordsResponse(
            $records
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        $data['records'] = $this->records->toArray();
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class ListRecordsResponseRecordsList implements \JsonSerializable
{
    /** @param array<int, mixed> $items */
    public function __construct(public array $items = [])
    {
    }

    /** @param array<int, mixed> $data */
    public static function fromArray(array $data): ListRecordsResponseRecordsList
    {
        return new ListRecordsResponseRecordsList(array_values($data));
    }

    /** @return array<int, mixed> */
    public function toArray(): array
    {
        return $this->items;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class ListZonesResponse implements \JsonSerializable
{
    public function __construct(
        public ListZonesResponseZonesList $zones
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): ListZonesResponse
    {
        if (!array_key_exists('zones', $data)) {
            throw new \InvalidArgumentException('Missing required field zones');
        }
        $zones = ListZonesResponseZonesList::fromArray(is_array($data['zones']) ? $data['zones'] : []);
        return new ListZonesResponse(
            $zones
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        $data['zones'] = $this->zones->toArray();
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class ListZonesResponseZonesList implements \JsonSerializable
{
    /** @param array<int, mixed> $items */
    public function __construct(public array $items = [])
    {
    }

    /** @param array<int, mixed> $data */
    public static function fromArray(array $data): ListZonesResponseZonesList
    {
        return new ListZonesResponseZonesList(array_values($data));
    }

    /** @return array<int, mixed> */
    public function toArray(): array
    {
        return $this->items;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class RecordResponse implements \JsonSerializable
{
    public function __construct(
        public string $id,
        public string $zoneId,
        public string $tenantId,
        public string $name,
        public RecordTypePayload $recordType,
        public int $ttl,
        public array $data,
        public int $version,
        public string $createdAt,
        public string $updatedAt
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): RecordResponse
    {
        if (!array_key_exists('id', $data)) {
            throw new \InvalidArgumentException('Missing required field id');
        }
        $id = (string) $data['id'];
        if (!array_key_exists('zoneId', $data)) {
            throw new \InvalidArgumentException('Missing required field zoneId');
        }
        $zoneId = (string) $data['zoneId'];
        if (!array_key_exists('tenantId', $data)) {
            throw new \InvalidArgumentException('Missing required field tenantId');
        }
        $tenantId = (string) $data['tenantId'];
        if (!array_key_exists('name', $data)) {
            throw new \InvalidArgumentException('Missing required field name');
        }
        $name = (string) $data['name'];
        if (!array_key_exists('recordType', $data)) {
            throw new \InvalidArgumentException('Missing required field recordType');
        }
        $recordType = RecordTypePayload::from((string) $data['recordType']);
        if (!array_key_exists('ttl', $data)) {
            throw new \InvalidArgumentException('Missing required field ttl');
        }
        $ttl = (int) $data['ttl'];
        if (!array_key_exists('data', $data)) {
            throw new \InvalidArgumentException('Missing required field data');
        }
        $data = is_array($data['data']) ? $data['data'] : [];
        if (!array_key_exists('version', $data)) {
            throw new \InvalidArgumentException('Missing required field version');
        }
        $version = (int) $data['version'];
        if (!array_key_exists('createdAt', $data)) {
            throw new \InvalidArgumentException('Missing required field createdAt');
        }
        $createdAt = (string) $data['createdAt'];
        if (!array_key_exists('updatedAt', $data)) {
            throw new \InvalidArgumentException('Missing required field updatedAt');
        }
        $updatedAt = (string) $data['updatedAt'];
        return new RecordResponse(
            $id,
            $zoneId,
            $tenantId,
            $name,
            $recordType,
            $ttl,
            $data,
            $version,
            $createdAt,
            $updatedAt
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        $data['id'] = $this->id;
        $data['zoneId'] = $this->zoneId;
        $data['tenantId'] = $this->tenantId;
        $data['name'] = $this->name;
        $data['recordType'] = $this->recordType->value;
        $data['ttl'] = $this->ttl;
        $data['data'] = $this->data;
        $data['version'] = $this->version;
        $data['createdAt'] = $this->createdAt;
        $data['updatedAt'] = $this->updatedAt;
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

enum RecordTypePayload: string implements \JsonSerializable
{
    case A = 'A';
    case AAAA = 'AAAA';
    case CNAME = 'CNAME';
    case MX = 'MX';
    case NS = 'NS';
    case SOA = 'SOA';
    case SRV = 'SRV';
    case TXT = 'TXT';

    public function jsonSerialize(): string
    {
        return $this->value;
    }
}

final class UpdateRecordRequest implements \JsonSerializable
{
    public function __construct(
        public string $tenantId,
        public ?string $name = null,
        public ?RecordTypePayload $recordType = null,
        public ?int $ttl = null,
        public ?array $data = null,
        public ?int $version = null
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): UpdateRecordRequest
    {
        if (!array_key_exists('tenantId', $data)) {
            throw new \InvalidArgumentException('Missing required field tenantId');
        }
        $tenantId = (string) $data['tenantId'];
        $name = array_key_exists('name', $data)
            ? (string) $data['name']
            : null;
        $recordType = array_key_exists('recordType', $data)
            ? RecordTypePayload::from((string) $data['recordType'])
            : null;
        $ttl = array_key_exists('ttl', $data)
            ? (int) $data['ttl']
            : null;
        $data = array_key_exists('data', $data)
            ? is_array($data['data']) ? $data['data'] : []
            : null;
        $version = array_key_exists('version', $data)
            ? (int) $data['version']
            : null;
        return new UpdateRecordRequest(
            $tenantId,
            $name,
            $recordType,
            $ttl,
            $data,
            $version
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        $data['tenantId'] = $this->tenantId;
        if ($this->name !== null) {
            $data['name'] = $this->name;
        }
        if ($this->recordType !== null) {
            $data['recordType'] = $this->recordType->value;
        }
        if ($this->ttl !== null) {
            $data['ttl'] = $this->ttl;
        }
        if ($this->data !== null) {
            $data['data'] = $this->data;
        }
        if ($this->version !== null) {
            $data['version'] = $this->version;
        }
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class UpdateZoneRequest implements \JsonSerializable
{
    public function __construct(
        public string $tenantId,
        public ?string $name = null,
        public ?int $version = null
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): UpdateZoneRequest
    {
        if (!array_key_exists('tenantId', $data)) {
            throw new \InvalidArgumentException('Missing required field tenantId');
        }
        $tenantId = (string) $data['tenantId'];
        $name = array_key_exists('name', $data)
            ? (string) $data['name']
            : null;
        $version = array_key_exists('version', $data)
            ? (int) $data['version']
            : null;
        return new UpdateZoneRequest(
            $tenantId,
            $name,
            $version
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        $data['tenantId'] = $this->tenantId;
        if ($this->name !== null) {
            $data['name'] = $this->name;
        }
        if ($this->version !== null) {
            $data['version'] = $this->version;
        }
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class ZoneResponse implements \JsonSerializable
{
    public function __construct(
        public string $id,
        public string $tenantId,
        public string $name,
        public int $version,
        public string $createdAt,
        public string $updatedAt,
        public ZoneResponseBucketsList $buckets
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): ZoneResponse
    {
        if (!array_key_exists('id', $data)) {
            throw new \InvalidArgumentException('Missing required field id');
        }
        $id = (string) $data['id'];
        if (!array_key_exists('tenantId', $data)) {
            throw new \InvalidArgumentException('Missing required field tenantId');
        }
        $tenantId = (string) $data['tenantId'];
        if (!array_key_exists('name', $data)) {
            throw new \InvalidArgumentException('Missing required field name');
        }
        $name = (string) $data['name'];
        if (!array_key_exists('version', $data)) {
            throw new \InvalidArgumentException('Missing required field version');
        }
        $version = (int) $data['version'];
        if (!array_key_exists('createdAt', $data)) {
            throw new \InvalidArgumentException('Missing required field createdAt');
        }
        $createdAt = (string) $data['createdAt'];
        if (!array_key_exists('updatedAt', $data)) {
            throw new \InvalidArgumentException('Missing required field updatedAt');
        }
        $updatedAt = (string) $data['updatedAt'];
        if (!array_key_exists('buckets', $data)) {
            throw new \InvalidArgumentException('Missing required field buckets');
        }
        $buckets = ZoneResponseBucketsList::fromArray(is_array($data['buckets']) ? $data['buckets'] : []);
        return new ZoneResponse(
            $id,
            $tenantId,
            $name,
            $version,
            $createdAt,
            $updatedAt,
            $buckets
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = [];
        $data['id'] = $this->id;
        $data['tenantId'] = $this->tenantId;
        $data['name'] = $this->name;
        $data['version'] = $this->version;
        $data['createdAt'] = $this->createdAt;
        $data['updatedAt'] = $this->updatedAt;
        $data['buckets'] = $this->buckets->toArray();
        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class ZoneResponseBucketsList implements \JsonSerializable
{
    /** @param array<int, mixed> $items */
    public function __construct(public array $items = [])
    {
    }

    /** @param array<int, mixed> $data */
    public static function fromArray(array $data): ZoneResponseBucketsList
    {
        return new ZoneResponseBucketsList(array_values($data));
    }

    /** @return array<int, mixed> */
    public function toArray(): array
    {
        return $this->items;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}

final class Types
{
}
