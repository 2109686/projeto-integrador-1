<?php

namespace App\Repositories;

use App\DTOs\Supports\{
    CreateSupportDTO,
    UpdateSupportDTO
};

use stdClass;

interface SupportRepositoryInterface
{
    public function getAll(string $filter = null): array;
    public function findOne(string $id): stdClass|null;
    public function delete(string $id): void;
    public function new(CreateSupportDTO $dto): stdClass;
    public function update(UpdateSupportDTO $id): stdClass|null;
    public function paginate(int $page = 1, int $totalPerPage = 15, string $filter = null): PaginationInterface;
}
