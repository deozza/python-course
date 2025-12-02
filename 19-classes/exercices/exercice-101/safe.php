<?php

$dataFromFile = getDataFromTxtFile();

$sanitizedData = getSanitizedData($dataFromFile);
saveSanitizedDataInCsv($sanitizedData);

$fileHandler = fopen(getSanitizedDataFilePath(), 'r');

file_put_contents(getLogFilePath(), "" . PHP_EOL);

echo getNumberOfSafeReports($fileHandler);
closeSanitizedDataFileHandler($fileHandler);

function writeLog(string $format, array $tokens): void {
    file_put_contents(getLogFilePath(), sprintf($format, ...$tokens) . PHP_EOL, FILE_APPEND);
}

function getLogFilePath(): string {
    return __DIR__ . '/logs/log.txt';
}

function getDataFromTxtFile(): string {
    return file_get_contents(getDataFilePath());
}

function getDataFilePath(): string {
    return __DIR__ . '/safe.txt';
}

function getSanitizedData(string $dirtyData): string {
   return str_replace(" ", ",", $dirtyData);
}

function saveSanitizedDataInCsv(string $sanitizedData): void {
    file_put_contents(getSanitizedDataFilePath(), $sanitizedData);
}

function getSanitizedDataFilePath(): string {
    return __DIR__ . '/input.csv';
}

function getNextLineOfSanitizedDataAsArray($fileHandler): array|false|null {
    return fgetcsv($fileHandler, 1000, ',', '"', '\\');
}

function getSanitizedDataFileHandler() {
    return fopen(getSanitizedDataFilePath(), 'r');
}

function closeSanitizedDataFileHandler($fileHandler) {
    fclose($fileHandler);
}

function getNumberOfSafeReports($fileHandler): int {
    $numberOfSafeReports = 0;

    $line = getNextLineOfSanitizedDataAsArray($fileHandler);

    
    while($line !== false && $line !== null) {
        if(isLineSafe($line) === true) {
            $numberOfSafeReports++;
        }
        $line = getNextLineOfSanitizedDataAsArray($fileHandler);
    }

    return $numberOfSafeReports;
}

function isLineSafe(array $line): bool {
    writeLog('----------------', []);
    writeLog("Working on line with numbers : %s", [implode(',', $line)]);
    
    $wasAscending = null;
    $isAscending = null;
    for($i = 1; $i < count($line); $i++) {
        $numberLeft = $line[$i-1];
        $numberRight = $line[$i];

        writeLog('Comparing number %d with number %d', [$numberLeft, $numberRight]);

        if(distanceIsValid($numberLeft, $numberRight) === false) {
            writeLog('Distance is invalid', []);
            return false;
        }

        $isAscending = isAscending($numberLeft, $numberRight);

        if($wasAscending !== null && $wasAscending !== $isAscending) {
            writeLog('Order has changed', []);
            return false;
        }

        $wasAscending = $isAscending;
    }

    writeLog("Line is safe", []);
    return true;
}

function distanceIsValid(int $numberLeft, int $numberRight): bool {
    $distance = $numberLeft - $numberRight;

    return abs($distance) > 0 && abs($distance) <= 3;
}

function isAscending(int $numberLeft, int $numberRight) : bool {
    return $numberLeft < $numberRight;
}

?>
