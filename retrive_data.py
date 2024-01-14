import mysql.connector

def get_columns_from_table(cursor, table_name):
    cursor.execute(f"SHOW COLUMNS FROM {table_name}")
    columns = [column[0] for column in cursor.fetchall()]
    return columns

def find_table_for_columns(cursor, tables, columns):
    column_table_mapping = {}
    for column in columns:
        for table in tables:
            table_columns = get_columns_from_table(cursor, table)
            if column in table_columns:
                column_table_mapping[column] = table
                break
    return column_table_mapping

try:
    connection = mysql.connector.connect(
        host='localhost',
        user='root',
        password='',
        database='hhp'  # Replace with your database name
    )

    if connection.is_connected():
        cursor = connection.cursor()

        # List of tables involved in your PHP code
        # heber, auswertung_".$data_a_db['S_Db'].", heber_".$data_a_db['S_Db'].", staaten, verein
        wk_num = 122
        tables = ['heber', f'heber_{wk_num}', f'heber_wk_{wk_num}']

        # List of columns involved in your PHP code
        columns = ['IdHeber', 'Jahrgang', 'time_Stossen', 'Gueltig_Reissen', 'Gueltig_Stossen', 'Technik_Stossen', 'Reissen', 'Technik_Reissen', 'time_Reissen', 'Gewicht', 'Geschlecht', 'GesGrp', 'Stossen']

        # Find the table each column belongs to
        column_table_mapping = find_table_for_columns(cursor, tables, columns)

        print("Column to Table Mapping:")
        for column, table in column_table_mapping.items():
            print(f"{column}: {table}")

except mysql.connector.Error as error:
    print(f"Failed to connect to MySQL: {error}")

finally:
    if connection.is_connected():
        cursor.close()
        connection.close()
