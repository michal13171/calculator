## Projekt Kalkulator

# Jest to czysty plugin do wordpressa więc należy go instalować jak każdą inną wtyczke po stronie admina

### Kroki instalacyjne
- pobierz repozytorium projekt
- kliknij npm install w środku projektu
- npm run build
- nastepnie użyj tej komendy "npx webpack" chodzi oto ,że użyłem w projekcje webpacka dla optymalizacji kodu minifikacji js oraz css
- W projekcie wykorzystuje scss więdz musicie zainstalwoać sassa ,aby móc zbudować assety
- Dla ułatwienia stylowania używam tailwindcss
- Zapakuj w zipie wszystkie pliki w tym folderze zaloguj się do wordpressa i w sekcji pluginy dodaj wtyczkę
- Kalkulator znajduje się pod tym shortcodem [wp_calculator_loaded_custom] 
- W takiej właśnie formie wkleić w wybrany blok gutenberga gdziekolwiek chcesz

## Informacje wyjaśniające
Jako ,ze jest to praca na webdevelopera pozwoliłem sobie zakodować od zera ten kalkulator nie wszystko wykonałem w nim na 100% ,bo wymaga to dłuższego czasu pracy ale na tę chwilę uważam ,że to bardzo wiele pokazuje z moich umiejętności
Z sekcji php nie zrobiłem zapisu ale sama wtyczka jest troszeczke obiektowo napisana klasa z kilkoma metodami i jedną metodą magiczną __construct()

## o samej obsłudze błędów
NullPointerException,
TypeError jeśli typ jest inny
dodałbym coś o eval ale jego nie używałem wcale wiec wyjatku nie da sie w moim kodzie znależć
SyntaxError błąd skłądniowy
NaN nie jest numerem